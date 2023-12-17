<?php include('./component/top.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resources</title>
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
      margin-top: 20px;
    }

    .text h1 {
      font-size: 40px;
      margin-bottom: 20px;
    }

    .text p {
      padding: 0 10px;
    }



    .filter .pose {
      display: inline-flex;
      gap: 20px;
      justify-content: center;
      align-items: center;
      padding: 10px 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .filter .pose a {
      border: 1px solid grey;
      padding: 10px 15px;
      font-size: 14px;
      transition: all 0.5s;
    }

    .filter .pose a:hover {
      background: orange;
    }

    .filter .pose a.active {
      background: orange;
    }

    .pose-img {
      display: flex;
      justify-content: start;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 30px;
    }

    .pose-img .card {
      position: relative;
      width: calc(100% / 3 - 10px);
      aspect-ratio: 1/0/8;
      overflow: hidden;
      margin-top: 10px;
      border-radius: 5px;
      max-height: 270px;
      -webkit-animation: slide-in-fwd-bottom 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
      animation: slide-in-fwd-bottom 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @media (width<600px) {
      .pose-img {
        padding: 10px;
      }

      .pose-img .card {
        width: calc(100% / 2 - 10px);
      }
    }

    .pose-img .card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .pose-img .card .shade {
      background: linear-gradient(transparent 50%, rgba(0, 0, 0, 0.529));
      width: 100%;
      height: 100%;
      position: absolute;
      display: flex;
      top: 0;
      left: 0;
      align-items: end;
      justify-content: start;
      padding: 10px;
      color: white;
      font-weight: bold;
      font-size: 17px;
      opacity: 1;
      transition: all 0.5s;
    }

    .pose-img .card .shade:hover {
      opacity: 0;
    }

    .slide-in-fwd-bottom {
      -webkit-animation: slide-in-fwd-bottom 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
      animation: slide-in-fwd-bottom 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @-webkit-keyframes slide-in-fwd-bottom {
      0% {
        -webkit-transform: translateZ(-1400px) translateY(800px);
        transform: translateZ(-1400px) translateY(800px);
        opacity: 0;
      }

      100% {
        -webkit-transform: translateZ(0) translateY(0);
        transform: translateZ(0) translateY(0);
        opacity: 1;
      }
    }

    @keyframes slide-in-fwd-bottom {
      0% {
        -webkit-transform: translateZ(-1400px) translateY(800px);
        transform: translateZ(-1400px) translateY(800px);
        opacity: 0;
      }

      100% {
        -webkit-transform: translateZ(0) translateY(0);
        transform: translateZ(0) translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <?php include('component/nav.php'); ?>

  <div class="container">
    <div class="text">
      <h1>Yoga Poses</h1>
      <p>
        Browse our extensive yoga pose library, with a vast collection of
        everything from basic beginners poses to Intermidiate poses and
        advanced yoga poses, seated and standing poses, twists, challenge
        poses.
      </p>

      <div class="filter">
        <div class="pose">
          <a onclick="allpose()" class="filter-btn all">All Poses</a>
          <a onclick="beginnerpose()" class="filter-btn beginner">Beginners Poses</a>
          <a onclick="intermediatepose()" class="filter-btn intermediate">Intermidiate Poses</a>
          <a onclick="advancepose()" class="filter-btn advance">Advance Poses</a>
        </div>
      </div>

      <div class="pose-img" id="pose-img">

      </div>

    </div>
  </div>
</body>

</html>
<script>
  const advance = [
    { name: "boat pose", pose: "./poses/advance/boatpose.png" },
    { name: "advance", pose: "./poses/advance/chinstand.png" },
    { name: "advance", pose: "./poses/advance/Compass.jpg" },
    { name: "advance", pose: "./poses/advance/crowpose.jpg" },
    { name: "advance", pose: "./poses/advance/Dhanurasana.jpg" },
    { name: "advance", pose: "./poses/advance/cowfacepose.jpg" },
  ];

  const intermidiate = [
    { name: "intermediate", pose: "./poses/intermediate/bird.jpg" },
    { name: "intermediate", pose: "./poses/intermediate/wheel.jpg" },
    { name: "intermediate", pose: "./poses/intermediate/dolphin.jpeg" },
    { name: "intermediate", pose: "./poses/intermediate/eagel.jpeg" },
    { name: "intermediate", pose: "./poses/intermediate/garlandpose.jpeg" },
    { name: "intermediate", pose: "./poses/intermediate/halfmoon.jpg" },
  ];

  const beginner = [
    { name: "beginnner", pose: "./poses/beginner/extendedtrianglepose.jpg" },
    { name: "beginnner", pose: "./poses/beginner/halfforward.jpg" },
    { name: "beginnner", pose: "./poses/beginner/tadasan.jpg" },
    { name: "beginnner", pose: "./poses/beginner/Uttan.jpg" },
    { name: "beginnner", pose: "./poses/beginner/warrior1.jpg" },
    { name: "beginnner", pose: "./poses/beginner/Warrior3.jpg" },
  ];

  let pose_img = document.getElementById("pose-img");

  function allpose() {
    pose_img.innerHTML = "";
    for (i = 0; i < advance.length - 1 + (intermidiate.length - 1) + (beginner.length - 1); i++) {
      if (i < advance.length) {
        let bone = `
      <div class="card">
          <img src="${advance[i].pose}" alt="" />
          <div class="shade">${advance[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone;
      }

      if (i < intermidiate.length) {
        let bone2 = `
      <div class="card">
          <img src="${intermidiate[i].pose}" alt="" />
          <div class="shade">${intermidiate[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone2;
      }

      if (i < beginner.length) {
        let bone3 = `
      <div class="card">
          <img src="${beginner[i].pose}" alt="" />
          <div class="shade">${beginner[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone3;
        setfilterbtn('all')
      }
    }
  }

  allpose();

  function beginnerpose() {
    pose_img.innerHTML = "";
    for (i = 0; i < beginner.length; i++) {
      if (i < beginner.length) {
        let bone3 = `
      <div class="card">
          <img src="${beginner[i].pose}" alt="" />
          <div class="shade">${beginner[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone3;
        setfilterbtn('beginner')
      }
    }
  }

  function intermediatepose() {
    pose_img.innerHTML = "";
    for (i = 0; i < intermidiate.length; i++) {
      if (i < intermidiate.length) {
        let bone3 = `
      <div class="card">
          <img src="${intermidiate[i].pose}" alt="" />
          <div class="shade">${intermidiate[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone3;
        setfilterbtn('intermediate')
      }
    }
  }

  function advancepose() {
    pose_img.innerHTML = "";
    for (i = 0; i < advance.length; i++) {
      if (i < advance.length) {
        let bone3 = `
      <div class="card">
          <img src="${advance[i].pose}" alt="" />
          <div class="shade">${advance[i].name}</div>
        </div>
      `;

        pose_img.innerHTML += bone3;
        setfilterbtn('advance')
      }
    }
  }

  function setfilterbtn(name) {
    let btn = document.querySelectorAll('.filter-btn')
    btn.forEach(element => {
      element.classList.remove('active')
      if (element.classList.contains(name)) {
        element.classList.add('active')
        console.log(name, 'active');
      }
    });
  }
</script>