<?php
// Start or resume the session (if needed)
session_start();

// Include your database connection script
include('conn.php');

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $question = $_POST['question'];
    $username = $_SESSION['name'];

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    $sql = "INSERT INTO forumquestion (question, username, time) VALUES ('$question', '$username', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../forum.php");
        echo "Question submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>