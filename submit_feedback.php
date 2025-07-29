<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'includes/dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $projectcode = trim($_POST['projectcode']);
    $rating = (int)$_POST['rating'];
    $comments = trim($_POST['comments']);
    $date = date('Y-m-d H:i:s');

    if ($rating < 1 || $rating > 5) {
        echo "Invalid rating value.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO tblfeedback (projectcode, rating, comments, submission_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $projectcode, $rating, $comments, $date);

    if ($stmt->execute()) {
        echo "<p>Feedback submitted successfully.</p>";
        echo '<a href="'.($_SESSION['role'] === 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php').'">Back to Dashboard</a>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: feedback.php");
    exit();
}
