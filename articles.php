<?php include('./component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <?php include('component/links.php'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        body {
            background: url(https://img.freepik.com/premium-photo/abstract-grainy-gradient-texture-background-neutral-minimalist-design_573550-651.jpg?w=360);
            background-size: cover;
            font-family: "Manrope", sans-serif;
            background: white;
        }

        .text {
            text-align: center;
            margin-top: 40px;
        }

        .text h1 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .article {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 10px;
        }

        .article .card {
            padding: 0px;
            display: flex;
            align-items: start;
            flex-direction: column;
            overflow: hidden;
            width: calc(100% / 3 - 20px);
            background: white;
            padding: 10px;
            gap: 10px;
        }

        .article .card .text {
            margin-top: 0;
            text-align: left;
            padding: 0;
            margin: 0;
        }

        .article .card .text h2 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .article .card .text p {
            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: left;
            font-size: 16px;
        }

        .article .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        @media(width<600px) {
            .article {
                flex-direction: column;
            }

            .article .card {
                width: 100%;
            }
        }

        .container .cont {
            display: flex;
            align-items: start;
            justify-content: space-between;
            background-color: #ffb91779;
            background-color: #fbfbfb;
            background-image: linear-gradient(315deg, #fbfbfb 0%, #f9886c 74%);
            border-radius: 5px;
            backdrop-filter: blur(6px);
            margin: 20px;
        }

        .container .cont .read {
            width: 70%;
            padding: 20px;
            margin: 20px;
        }

        .container .cont .read p {
            text-align: left;
            max-width: 100%;
            letter-spacing: 1px;
            color: black;
            font-weight: 400;
        }

        .container .cont .img {
            width: 45%;
            min-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }


        .container .cont .img img {
            max-width: 100%;
            box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
            border-radius: 10px;
        }

        .container .cont .read .btn button {
            background-color: rgba(0, 0, 0, 0.903);
            padding: 17px 30px;
            color: white;
            display: block;
            margin-top: 40px;
            text-align: center;
            border-radius: 30px;
            letter-spacing: 1.6px;
            width: 200px;
        }

        h2 {
            margin-bottom: 0;
        }

        @media(width<600px) {
            .container .cont {
                flex-direction: column-reverse;
                border-radius: 10px;
            }

            .container .cont .read {
                margin: 0;
                padding: 10px;
                width: 100%;
            }

            .container .cont .read h2 {
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .container .cont .read p {
                display: -webkit-box;
                -webkit-line-clamp: 6;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .container .cont .img {
                padding: 10px;
                min-width: 100%;
                width: 100%;
            }

            .container .cont .img img {
                width: 100%;
                min-width: 100%;
            }

            .container .cont .read .btn button {
                width: 100%;
            }
        }

        .container .other {
            padding-bottom: 20px;
            padding-left: 0px;
            height: 30px;
            margin-top: 20px;
            margin: 20px;
        }

        .container .other h3 {
            font-weight: bold;
        }

        .container .text {
            margin: 20px;
        }
    </style>
</head>
</style>
</head>

<body>
    <?php include('component/nav.php'); ?>
    <div class="container">
        <div class="text">
            <h1>
                Articles
            </h1>
            <p>Yoga, an ancient practice and meditation, has become increasingly popular in today's busy society. For
                many people, yoga provides a retreat from their chaotic and busy lives. This is true whether you're
                practicing downward facing dog posture on a mat in your bedroom, in an ashram in India or even in New
                York City's</p>
        </div>
        <div class="cont">
            <div class="read">
                <h2>yoga articles</h2>
                <br>
                <p>It’s time to roll out your yoga mat and discover the combination of physical and mental exercises
                    that for thousands of years have hooked yoga practitioners around the globe. The beauty of yoga is
                    that you don’t have to be a yogi or yogini to reap the benefits.
                <div class="btn">
                    <button>Read Blog</button>
                </div>
                </p>
            </div>
            <div class="img">
                <img src="./assets/articlebg.png" alt="">
            </div>
        </div>
        <div class="other">
            <br>
            <h3>Other blogs</h3>
        </div>
        <div class="article">

            <?php
            include('php/getarticles.php');

            
            if ($articlesresult->num_rows > 0) {

                while ($row = $articlesresult->fetch_assoc()) {

                    echo "
                    <div class='card'>
                    <img src='" . $row['image'] . "' alt=''>
                    <div class='text'>
                        <h2>" . $row['title'] . "</h2>
                        <p>" . $row['paragraph'] . "</p>
                    </div>
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

    </div>
</body>

</html>