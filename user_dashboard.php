<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>User Dashboard</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
<ul>
    <li><a href="add_complaint.php">Submit Complaint</a></li>
    <li><a href="my_complaints.php">My Complaints</a></li>
    <li><a href="feedback.php">Submit Feedback</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>
