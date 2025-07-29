<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

$sql = "SELECT * FROM tblfeedback ORDER BY submission_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>View Feedback</title></head>
<body>
<h2>User Feedback</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Project Code</th>
        <th>Rating</th>
        <th>Comments</th>
        <th>Submission Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($feedback = $result->fetch_assoc()) {
            echo "<tr>
                <td>".htmlspecialchars($feedback['id'])."</td>
                <td>".htmlspecialchars($feedback['projectcode'])."</td>
                <td>".htmlspecialchars($feedback['rating'])."</td>
                <td>".htmlspecialchars($feedback['comments'])."</td>
                <td>".htmlspecialchars($feedback['submission_date'])."</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No feedback submitted yet.</td></tr>";
    }
    $conn->close();
    ?>
</table>

<a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
