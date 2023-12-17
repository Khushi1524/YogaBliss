<?php include('./component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <?php include('component/links.php'); ?>

    <style>
        <?php include('assets/style1.css'); ?>
    </style>
</head>

<body>
    <?php include('component/nav.php'); ?>

    <div class="container">
        <form action="php/login.php" method="post">
            <h1>Login</h1>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="john123@gmail.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
            <p class="para">Do not have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>