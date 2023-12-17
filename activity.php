<?php include('./component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Activity</title>
  <?php include('component/links.php'); ?>
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
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .row {
    display: flex;
  }

  @media(width < 800px) {
    .row {
      justify-content: center;
      flex-wrap: wrap;
    }

  }

  .container .task {
    /* background-image: linear-gradient(315deg, #fbfbfb 0%, #f9886c 74%); */
    gap: 10px;
    padding: 10px;
    margin: 20px;
    border-radius: 10px;
    background: whitesmoke;
    width: 300px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    transform: all 0.5s;
  }

  .container .task:hover {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
  }

  .container>.text {
    text-align: center;
    margin: 20px 0;
  }

  .container .task .txt p {
    font-size: 14px;
  }

  .container .task .txt a button {
    background-color: orange;
    color: white;
    padding: 10px 20px;
    margin-top: 15px;
    display: block;
    text-align: center;
    border-radius: 10px;
    letter-spacing: 1.5px;
    width: 100%;
    border: 1px solid orange;
    transform: all 0.5s;
  }

  .container .row .task .txt a button:hover {
    opacity: 100%;
    background-color: transparent;
    color: white;
    border: 1px solid orange;
    color: orange;
  }

  .container .task .txt img {
    width: 100%;
    border-radius: 5px;
    aspect-ratio: 1/0.6;
    object-fit: cover;
  }

  .container .task .txt h3 {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #55555588;
    padding-bottom: 10px;
    padding-top: 5px;
  }

  .container .task .txt h3 span {
    padding-right: 5px;
  }

  .container .task .txt p {
    margin-top: 10px;
  }

  .container .task .circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: pink;
  }
</style>

<body>
  <?php include('component/nav.php'); ?>
  <div class="container">

    <div class="text">
      <h1>Daily Challenges</h1>
    </div>

    <div class="row">
      <div class="task">
        <div class="txt">
          <img src="assets/activity/basic.jpg" alt="">
          <h3>Basic Poses <span id="BASIC-POSES-percentage">0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/basic.php"><button>Start Now</button></a>
        </div>
      </div>

      <div class="task">
        <div class="txt">
          <img src="assets/activity/breathing.png"" alt="">
          <h3>Breathing <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href=" activity/breathing.php"><button>Start Now</button></a>
        </div>
      </div>

      <div class=" task">
        <div class="txt">
          <img src="assets/activity/weightloss.png" alt="">
          <h3>Weight loss <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/one.php"><button>Start Now</button></a>
        </div>
      </div>

      <div class="task">
        <div class="txt">
          <img src="assets/activity/pcos.jpg" alt="">
          <h3>PCOS <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/one.php"><button>Start Now</button></a>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="task">
        <div class="txt">
          <img src="assets/abs.png" alt="">
          <h3>Abs workout <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/abs.php"><button>Start Now</button></a>
        </div>
      </div>

      <div class="task">
        <div class="txt">
          <img src="assets/diet.png" alt="">
          <h3>Diet <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/abs.php"><button>Start Now</button></a>
        </div>
      </div>
      <div class="task">
        <div class="txt">
          <img src="assets/flexibility.png" alt="">
          <h3>Flexibility <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/abs.php"><button>Start Now</button></a>
        </div>
      </div>

      <div class="task">
        <div class="txt">
          <img src="assets/pcos.jpg" alt="">
          <h3>PCOS <span>0%</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, enim.</p>
          <a href="activity/abs.php"><button>Start Now</button></a>
        </div>
      </div> -->
  </div>

  <script>
    let BASIC_POSES_percentage = localStorage.getItem('BASIC-POSES-percentage')
    if (BASIC_POSES_percentage != '' || BASIC_POSES_percentage != null) {
      document.getElementById('BASIC-POSES-percentage').innerHTML = BASIC_POSES_percentage + "%";
    } else {
      document.getElementById('BASIC-POSES-percentage').innerHTML = 0 + "%";
    }
  </script>
</body>

</html>