<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Submit Feedback</title></head>
<body>
<h2>Submit Feedback</h2>

<form method="post" action="submit_feedback.php">
    Project Code:<br>
    <input type="text" name="projectcode" required><br><br>

    Rating (1-5):<br>
    <input type="number" name="rating" min="1" max="5" required><br><br>

    Comments:<br>
    <textarea name="comments"></textarea><br><br>

    <input type="submit" value="Submit Feedback">
</form>

<a href="<?php echo ($_SESSION['role'] === 'admin') ? 'admin_dashboard.php' : 'user_dashboard.php'; ?>">Back to Dashboard</a>
</body>
</html>
