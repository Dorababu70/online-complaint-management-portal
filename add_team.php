<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamName = trim($_POST['teamname']);
    $projectDetails = trim($_POST['projectdetails']);
    $dueDate = $_POST['duedate'];

    if (empty($teamName) || empty($projectDetails) || empty($dueDate)) {
        $error = "All fields are required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO tblteam (TeamName, ProjectDetails, DueDate) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $teamName, $projectDetails, $dueDate);

        if ($stmt->execute()) {
            $success = "Team/Project added successfully.";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Team/Project</title></head>
<body>
<h2>Add Team or Project</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>

<form method="post" action="add_team.php">
    Team Name:<br>
    <input type="text" name="teamname" required><br><br>

    Project Details:<br>
    <textarea name="projectdetails" required></textarea><br><br>

    Due Date:<br>
    <input type="date" name="duedate" required><br><br>

    <input type="submit" value="Add Team/Project">
</form>

<a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
