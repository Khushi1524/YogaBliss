<?php
if (isset($_POST['id'], $_POST['title'], $_POST['imageurl'], $_POST['paragraph'])) {
    $articleId = $_POST['id'];
    $title = $_POST['title'];
    $imageurl = $_POST['imageurl'];
    $paragraph = $_POST['paragraph'];

    include('conn.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    // Update the article in the database
    $sql = "UPDATE articles SET title = '$title', image = '$imageurl', paragraph = '$paragraph' WHERE id = $articleId";

    if ($conn->query($sql)) {
        header("Location: ../admin.php");
    } else {
        echo "Error updating article: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Incomplete data provided for updating the article.";
}
?>
