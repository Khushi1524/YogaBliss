<?php
include('conn.php');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql = "SELECT * FROM articles";
$articlesresult = $conn->query($sql);

$conn->close();
?>