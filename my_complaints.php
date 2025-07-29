<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

$username = $_SESSION['username'];

// Here, for simplicity, using WorkerNo as username or you can adjust to your schema.
$sql = "SELECT * FROM tblwork WHERE WorkerNo = ? ORDER BY SubmissionDate DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head><title>My Complaints</title></head>
<body>
<h2>My Complaints</h2>
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
    $stmt->close();
    $conn->close();
    ?>
</table>
<a href="user_dashboard.php">Back to Dashboard</a>
</body>
</html>
