<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Submit Complaint</title></head>
<body>
<h2>Submit New Complaint</h2>

<form method="post" action="submit_complaint.php">
    Worker No:<br>
    <input type="text" name="workerno" required><br><br>

    Worker Name:<br>
    <input type="text" name="workername" required><br><br>

    Complaint Details:<br>
    <textarea name="workdetails" required></textarea><br><br>

    Submission Date:<br>
    <input type="date" name="submissiondate" required><br><br>

    <input type="submit" value="Submit Complaint">
</form>

<a href="user_dashboard.php">Back to Dashboard</a>
</body>
</html>
