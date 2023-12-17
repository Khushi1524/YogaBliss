<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Edit Article</h2>
            <?php
            include('../php/conn.php');
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

            if ($conn->connect_errno) {
                echo "Failed to connect to MySQL: " . $conn->connect_error;
                exit();
            }

            if (isset($_GET['id'])) {
                $articleId = $_GET['id'];

                // Fetch the article data from the database
                $sql = "SELECT * FROM articles WHERE id = $articleId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <form action="../php/updatearticle.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $articleId; ?>">
                        <input type="text" placeholder="Title" name="title" value="<?php echo $row['title']; ?>" required>
                        <input type="text" placeholder="Image URL" name="imageurl" value="<?php echo $row['image']; ?>"
                            required>
                        <textarea cols="30" rows="10" placeholder="Paragraph" name="paragraph"
                            required><?php echo $row['paragraph']; ?></textarea>
                        <button type="submit">Update article</button>
                    </form>
                    <?php
                } else {
                    echo "Article not found.";
                }
            } else {
                echo "No article ID provided in the request.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>