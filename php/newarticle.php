<?php
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $imageurl = $_POST['imageurl'];
    $paragraph = $_POST['paragraph'];

    include('conn.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    $sql = "INSERT INTO articles VALUE('','$title','$paragraph','$imageurl')";
    $result = $conn->query($sql);

    echo "done";

    $conn->close();

    header("Location: ../admin.php");
}
?>