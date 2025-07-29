<?php
session_start();
include 'includes/dbconfig.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT userid, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($userid, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($pass, $hashed_password)) {
            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $user;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Username not found.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="login.php">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>
