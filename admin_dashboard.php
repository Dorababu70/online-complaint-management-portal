<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> (Admin)</h2>
<ul>
    <li><a href="view_complaints.php">View All Complaints</a></li>
    <li><a href="add_team.php">Add Team/Project</a></li>
    <li><a href="view_feedback.php">View Feedback</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>
