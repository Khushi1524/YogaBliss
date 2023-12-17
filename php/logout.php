<?php
session_start();

// Unset or clear the session variables
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['logged']);
unset($_SESSION['admin']);

// Destroy the session
session_destroy();

// Redirect the user to a login page or another suitable destination
header("Location: ../login.php");
exit();
?>