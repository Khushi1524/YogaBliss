<?php
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    include('conn.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    // Delete the article using a SQL query (without prepared statement)
    $sql = "DELETE FROM articles WHERE id = $articleId";

    $conn->query($sql);

    $conn->close();

    header("Location: ../admin.php");
} else {
    echo "No article ID provided in the request.";
}
?>