<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workerno = trim($_POST['workerno']);
    $workername = trim($_POST['workername']);
    $workdetails = trim($_POST['workdetails']);
    $submissiondate = $_POST['submissiondate'];

    $stmt = $conn->prepare("INSERT INTO tblwork (WorkerNo, WorkerName, WorkDetails, SubmissionDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $workerno, $workername, $workdetails, $submissiondate);

    if ($stmt->execute()) {
        echo "<p>Complaint submitted successfully.</p>";
        echo '<a href="user_dashboard.php">Back to Dashboard</a>';
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: add_complaint.php");
    exit();
}
?>
