<?php include('../component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include('../assets/style.css'); ?>
    </style>
    <?php include('../component/links.php'); ?>
</head>
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
        background-size: cover;
        font-family: "Manrope", sans-serif;
        background: white;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .container .heading {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .container .img {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .container .img img {
        max-width: 100%;
        min-width: 400px;
    }

    .container .btn {
        display: flex;
        justify-content: center;
        gap: 10px;
        background: white;
        align-items: center;
        position: sticky;
        bottom: 0px;
        padding: 10px;
        margin-top: 20px;
    }

    .container .btn button {
        background-color: orange;
        color: white;
        padding: 17px 40px;
        text-align: center;
        border-radius: 5px;
        letter-spacing: 1.5px;
        width: 150px;
    }

    .container .btn #poseprevious {
        border: 1px solid orange;
        background: none;
        color: orange;
    }

    #posedesc {
        margin-top: 20px;
        max-height: 45vh;
        overflow: scroll;
    }

    #posefinish {
        display: none;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: start;
        gap: 20px;
        margin-top: 50px;
    }

    .content .poseinfo {
        text-align: left;
        width: 100%;
    }

    .container #points {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        max-width: 100%;
    }

    .container #points .dot {
        width: 25px;
        height: 25px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        text-align: center;
        background: whitesmoke;
    }

    .container #points .dot.active {
        background: orange;
    }

    .container #points::after {
        content: "";
        height: 3px;
        width: 100%;
        background: orange;
        display: block;
        width: calc(1);
        float: left;
        position: absolute;
        z-index: -1;
    }

    @media(width<800px) {
        .content {
            display: flex;
            justify-content: start;
            align-items: center;
            flex-direction: column;
        }

        .content .poseinfo {
            padding: 20px;
        }

        .container #points {
            padding: 0 20px;
        }

        .container #points::after {
            width: 90%;
        }
    }
</style>

<body>
    <?php
    $logopath = "../assets/";
    include('../component/nav.php');
    ?>
    <div class="container">
        <div class="heading">
            <h1>PRANAYAAM</h1>
        </div>

        <div id="points"></div>

        <div class="content">
            <div class="img">
                <img id="poseimage" src="" alt="">
            </div>
            <span class="poseinfo">
                <h2 id="posetitle"></h2>
                <p style="WHITE-SPACE: pre" id="posedesc"></p>
            </span>
        </div>

        <div class="btn">
            <button id="poseprevious">Previous</button>
            <button id="posenext">Next</button>
            <a href="../activity.php"><button id="posefinish">Finish</button></a>
        </div>
    </div>
    <script>
        const steps = {
            0: {
                name: "extendedtrianglepose",
                image: "../poses/beginner/extendedtrianglepose.jpg",
                description: "../poses/beginner/extendedtrianglepose.html",
                time: "5", // in minutes
                next: 1,
                previous: false,
            },
            1: {
                name: "halfforward",
                image: "../poses/beginner/halfforward.jpg",
                description: "../poses/beginner/halfforward.html",
                time: "3", // in minutes
                next: 2,
                previous: 0,
            },
            2: {
                name: "tadasan",
                image: "../poses/beginner/tadasan.jpg",
                description: "../poses/beginner/tadasan.html",
                time: "3", // in minutes
                next: 3,
                previous: 1,
            },
            3: {
                name: "Uttan",
                image: "../poses/beginner/Uttan.jpg",
                description: "../poses/beginner/Uttan.html",
                time: "3", // in minutes
                next: false,
                previous: 2,
            },
        };

        for (let i = 0; i < Object.keys(steps).length; i++) {
            points.innerHTML += "<div class='dot' id='" + i + "'>" + (i + 1) + "</div>";
        }

        const poseimage = document.getElementById('poseimage');
        const posetitle = document.getElementById('posetitle');
        const posedesc = document.getElementById('posedesc');
        const poseprevious = document.getElementById('poseprevious');
        const posenext = document.getElementById('posenext');
        const posefinish = document.getElementById('posefinish');

        let currentState = localStorage.getItem('BASIC-POSES');
        console.log(currentState);

        if (currentState === null || isNaN(currentState) || currentState < 0 || currentState >= Object.keys(steps).length) {
            currentState = 0;
        }

        updatePose(currentState);

        function updatePose(state) {
            if (state == 0) {
                poseprevious.style.display = 'none';
            } else {
                poseprevious.style.display = 'block';
            }

            setdot(state)
            setpercentage(state)

            poseimage.src = steps[state].image;
            posetitle.textContent = steps[state].name;
            posedesc.textContent = steps[state].description;

            getdesc(steps[state].description)

            if (steps[state].next != false) {
                console.log(steps[state].next, 'set nect');
                posenext.style.display = 'block';
                posefinish.style.display = 'none';
                console.log(steps[state].next, 'next');
                posenext.onclick = () => {
                    let nextcurrentState = steps[state].next;
                    updatePose(nextcurrentState);
                };

                console.log(steps[state].previous, 'set prev', steps[state].previous !== false);
                if (steps[state].previous !== false) {
                    console.log(steps[state].previous, 'set prev2');
                    poseprevious.onclick = () => {
                        let previousState = steps[state].previous;
                        console.log(previousState);
                        updatePose(previousState, "prev");
                    };
                }

            } else {

                if (steps[state].previous != false) {
                    poseprevious.onclick = () => {
                        let previousState = steps[state].previous;
                        console.log(previousState);
                        updatePose(previousState, "prev");
                    };
                }
                posenext.style.display = 'none';
                posefinish.style.display = 'block';
            }

            console.log("updare called");
            localStorage.setItem('BASIC-POSES', String(state));
        }

        async function getdesc(path) {
            try {
                const response = await fetch(path);
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.text();
                posedesc.innerHTML = data;
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        function setdot(number) {
            document.querySelectorAll('.dot').forEach((element) => {
                element.classList.remove('active')

                if (element.id == number) {
                    element.classList.add('active')
                }
            })
        }

        function setpercentage(number) {
            let percentage = (number + 1) * 100;
            percentage = percentage / (Object.keys(steps).length);
            localStorage.setItem('BASIC-POSES-percentage', String(percentage))
            console.log(localStorage.getItem('BASIC-POSES-percentage'));
        }
    </script>
</body>

</html>