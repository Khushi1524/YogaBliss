<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('component/links.php'); ?>

    <link rel="stylesheet" href="assets/style1.css">
</head>

<body>
    <?php include('component/nav.php'); ?>
    <div class="container">
        <form action="php/register.php" method="post">
            <h1>Sign up</h1>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="john123@gmail.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password">
            <button type="submit">Submit</button>
            <p class="para">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>

</html>