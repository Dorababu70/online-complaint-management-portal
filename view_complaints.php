<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

$sql = "SELECT * FROM tblwork ORDER BY SubmissionDate DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>All Complaints</title></head>
<body>
<h2>All Complaints</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Work ID</th>
        <th>Worker No</th>
        <th>Worker Name</th>
        <th>Details</th>
        <th>Submission Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".htmlspecialchars($row['WorkID'])."</td>
                <td>".htmlspecialchars($row['WorkerNo'])."</td>
                <td>".htmlspecialchars($row['WorkerName'])."</td>
                <td>".htmlspecialchars($row['WorkDetails'])."</td>
                <td>".htmlspecialchars($row['SubmissionDate'])."</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No complaints found.</td></tr>";
    }
    $conn->close();
    ?>
</table>
<a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
