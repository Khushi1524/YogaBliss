<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include('component/links.php'); ?>


    <style>
        body {
            background: none;
            padding: 20px;
        }

        input,
        textarea,
        button {
            border: 1px solid black;
        }

        #article {
            margin-top: 20px;
        }

        .addbutton {
            padding: 10px;
            margin-top: 10px;
            background: #007FFF;
            color: white;
        }

        #article img {
            width: 100px;
        }

        #article .card {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
            margin-top: 20px;
        }

        .article .card .text {
            width: 100%;
        }

        #article .card .text p {
            width: 100%;
        }

        .article .card .delete {
            padding: 10px;
            background: #fd5c63;
        }

        .article .card .delete.edit {
            background: none;
            border: 1px solid black;
        }


        .login-form .container {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-form .container form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
        }

        .login-form .container form h1 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .login-form .container form input {
            border: 1px solid gray;
            padding: 10px 10px;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .login-form .container form label {
            font-size: 14px;
            margin-bottom: 7px;
            display: block;
        }

        .login-form .container form button {
            width: 100%;
            padding: 12px 10px;
            border-radius: 5px;
            background-color: rgb(129, 178, 244);
            font-size: 15px;
            color: rgb(53, 52, 52);
        }

        .login-form .container form .para {
            margin-top: 20px;
            font-size: 13.5px;
        }

        .login-form .container form .para a {
            color: rgb(13, 64, 130);
        }

        .logout {
            background: #f5f5f5;
            padding: 10px;
            color: red;
            float: right;
            margin-top: -40px;
            border: 1px solid red;
        }
    </style>
</head>

<body>
<?php include('component/nav.php'); ?>  

    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

        ?>
        <div class="container">
            <h1>Admin panel </h1>
            <a href="php/logout.php" class="logout">Logout</a>

            <div id="article">
                <h4>Articles</h4>
                <a href="admin/addarticle.php"><button class="addbutton">+ Add Article</button></a>


                <div class="article">

                    <?php
                    include('php/getarticles.php');

                    
                    if ($articlesresult->num_rows > 0) {

                        while ($row = $articlesresult->fetch_assoc()) {

                            echo "
                    <div class='card'>
                    <img src='" . $row['image'] . "' alt=''>
                    <div class='text'>
                        <p>" . $row['title'] . "</p>
                    </div>
                    <a class='delete edit' href='admin/updatearticle.php?id=" . $row['id'] . "'>Edit</a>
                    <a class='delete' href='php/deletearticle.php?id=" . $row['id'] . "'>Delete</a>
                </div>
                    ";

                        }
                    } else {
                        echo "0 articlesresults";
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php } else {
        ?>


        <div class="login-form">
            <div class="container">
                <form action="php/adminlogin.php" method="post">
                    <h1>Admin Login</h1>
                    <label for="name">name</label>
                    <input type="text" name="name" id="email" placeholder="admin">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit">Login</button>
                    <p class="para">Do not have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </div>
        </div>

    <?php } ?>
</body>

</html>