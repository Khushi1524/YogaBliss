<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $adminpassword = 'admin';
    $adminusername = 'admin';

    if ($adminpassword == $password && $adminusername == $name) {
        $_SESSION['admin'] = true;
        header('Location: ../admin.php');
    }
    else {
        $_SESSION['admin'] = false;
    }
}
?>