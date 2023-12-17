<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include('conn.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    $hashed_password = $password;

    $sql = "SELECT id,name FROM register WHERE email = '$email' AND hashed_password = '$hashed_password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows === 1) {


            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['logged'] = true;

            header('Location: ../');
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Query error: " . $conn->error;
    }

    $conn->close();
}
?>