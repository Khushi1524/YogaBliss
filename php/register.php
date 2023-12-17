<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    

    if ($password === $confirm_password) {
       
        $hashed_password = $password;

        $sql = "INSERT INTO register (name, email, hashed_password) VALUES ('$name', '$email', '$hashed_password')";

        include('conn.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        }

        if ($conn->query($sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Password and confirm password do not match.";
    }
}
?>