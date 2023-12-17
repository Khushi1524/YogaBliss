<?php
session_start();

include('conn.php');

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $replyid = $_POST['replyid'];
    $reply = $_POST['reply'];
    $username = $_SESSION['name'];

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    $sql = "INSERT INTO forumreply (replyid, reply, username, time) VALUES ('$replyid', '$reply', '$username', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../forum.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>