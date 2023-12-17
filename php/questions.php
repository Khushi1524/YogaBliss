<?php
include('conn.php');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql = "SELECT * FROM forumquestion ORDER BY time DESC";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
    exit();
}

function getreply($replyid)
{
    $conn2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
    if ($conn2->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn2->connect_error;
        exit();
    }

    $replies = array();

    $sql = "SELECT * FROM forumreply WHERE replyid = $replyid ORDER BY time ASC";
    $result = $conn2->query($sql);

    if (!$result) {
        return array('error' => "Error: " . $conn2->error);
    }

    while ($row = $result->fetch_assoc()) {
        $replies[] = $row;
    }

    $conn2->close();

    return $replies;
}
?>