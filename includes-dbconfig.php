<?php
$servername = "localhost";
$username = "root";
$password = "";  // Set your MySQL root password if any
$dbname = "complaint_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
