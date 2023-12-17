<?php include('./component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meditation</title>
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
    background: url(https://img.freepik.com/premium-photo/abstract-grainy-gradient-texture-background-neutral-minimalist-design_573550-651.jpg?w=360);
    background-size: cover;
    font-family: "Manrope", sans-serif;
    background: white;
  }

  p {
    color: rgb(83, 83, 83);
    font-size: 15px;
  }

  .nav {
    background-color: rgba(120, 120, 120, 0.215);
    height: 50px;
    margin: 10px;
    border-radius: 5px;
  }

  .container {
    max-width: 1200px;
    padding: 10px;
    margin: 0 auto;
  }

  .box {
    display: flex;
    justify-content: space-between;
    align-items: start;
    gap: 0px;
  }

  .box .list {
    width: 100%;
  }

  .box .list .songs {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .box .list .songs .songbox {
    width: calc(100% / 3 - 10px);
    padding: 10px;
    position: relative;
    background-color: rgb(255, 255, 255);
    border-radius: 5px;
    overflow: hidden;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
  }

  .box .list .songs .songbox img {
    width: 100%;
    aspect-ratio: 1/0.7;
    height: calc(100% - 4ch);
    object-fit: cover;
    border-radius: 5px;
  }

  .box .list .songs p {
    padding: 5px;
    margin-top: 5px;
  }

  .box .list .songs .songbox .playbutton {
    width: 50px;
    background-color: #ff6100;
    height: 50px;
    background-image: url(https://img.icons8.com/?size=512&id=59862&format=png);
    background-size: 20px;
    background-repeat: no-repeat;
    background-position: center center;
    border-radius: 50%;
    position: absolute;
    right: 20px;
    bottom: 20px;
    backdrop-filter: blur(6px);
    box-shadow: 0 4px 5px rgba(0, 0, 0, 0.425);
  }

  /*  */

  .box .player {
    max-width: 300px;
    width: 100%;
    padding: 10px;
    height: 100%;
    border-radius: 10px;
    backdrop-filter: blur(6px);
    background-color: rgba(255, 255, 255, 0.695);
  }

  .box .player .imgbox {
    position: relative;
    height: 180px;
  }

  .box .player .imgbox img {
    width: 100%;
    position: absolute;
    border-radius: 5px;
    aspect-ratio: 1/0.7;
  }

  .box .player .imgbox img:nth-child(1) {
    filter: blur(7px);
    scale: 0.9px;
    margin-top: 7px;
  }

  .box .player .desc h3 {
    font-family: "Lumanosimo", cursive;
  }

  .box .player .controls {
    margin-top: 30px;
    width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .box .player .controls audio {
    width: 100%;
  }

  .box .player p {
    margin-top: 10px;
  }

  .box .player #close {
    display: none;
  }

  .banner {
    background: url(https://i.pinimg.com/736x/2f/62/23/2f6223e8f525410e39b2180d1381900a.jpg);
    margin-bottom: 20px;
    padding: 40px;
    border-radius: 5px;
    background-size: cover;
    background-position: center center;
    margin-top: 10px;
  }

  .banner h1 {
    font-size: 43px;
    color: rgba(255, 255, 255, 0.707);
    font-family: "Lumanosimo", cursive;
  }

  .banner p {
    color: rgba(255, 255, 255, 0.526);
  }

  @media (width < 900px) {
    .box .list .songs .songbox {
      width: calc(100% / 3 - 10px);
    }
  }

  @media (width < 600px) {
    .box {
      flex-direction: column;
    }

    .box .list .songs .songbox {
      width: calc(100% / 2 - 10px);
    }

    .box .player {
      position: fixed;
      /* top: 200vh; */
      left: 0;
      z-index: 2;
      width: 100%;
      max-width: 100%;
      background: white;
      margin-top: 0;
      border-radius: 0;
      transition: all 1s;
    }

    .box .player #close {
      background: transparent;
      width: 40px;
      height: 40px;
      display: block;
      background: rgba(0, 0, 0, 0.708);
      border-radius: 20px;
      color: white;
      display: grid;
      place-items: center;
      margin-bottom: 20px;
      float: right;
    }

    .box .player .imgbox {
      margin-top: 60px;
    }

    .box .player .controls {
      margin-top: 100px;
    }
  }
</style>

<body>
  <?php include('component/nav.php'); ?>

  <div class="container">
    <div class="banner">
      <h1>Meditation</h1>
      <div id="data"></div>
      <p>
        To know one's own mind is nothing short of life-changing
      </p>
    </div>

    <div class="box">
      <div class="list">
        <div class="songs" id="songs"></div>
      </div>

      <div class="player" id="player">
        <button id="close" onclick="closeplayer()">X</button>
        <div class="imgbox">
          <img id="plyimg1" src="https://i.pinimg.com/originals/a4/c9/46/a4c9468518fd76e61b81fdf2b85b9553.jpg" alt="" />
          <img id="plyimg2" src="https://i.pinimg.com/originals/a4/c9/46/a4c9468518fd76e61b81fdf2b85b9553.jpg" alt="" />
        </div>
        <div class="controls">
          <audio src="" controls id="plaudio"></audio>
        </div>
        <div class="desc">
          <h3 id="plyh1"></h3>
          <p id="plyp">
            ]
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  let playlist = [
    {
      name: "Binural Beats",
      audio: "./meditationAudios/binuralbeats.mp3",
      img: "https://as1.ftcdn.net/v2/jpg/02/72/79/94/1000_F_272799442_r9JE56LrF8bPzISdHPryMKGZ2ccwB1Ss.jpg",
      desc: "When you hear two tones — one in each ear — that are slightly different in frequency, your brain processes a beat at the difference of the frequencies. This is called a binaural beat.",
    },
    {
      name: "Relaxing",
      audio: "./meditationAudios/realxing.mp3",
      img: "https://img.freepik.com/premium-photo/watercolor-meditation-mindfulness-lifestyle-concept-art-spiritual-awareness-mental-soul-health-self-care-healthy-habit-generative-ai_438099-13493.jpg?w=1380",
      desc: "Music can have a profound effect on both the emotions and the body. Faster music can make you feel more alert and concentrate better. Upbeat music can make you feel more optimistic and positive about life.",
    },
    {
      name: "Nature",
      audio: "./meditationAudios/nature.mp3",
      img: "https://e0.pxfuel.com/wallpapers/370/658/desktop-wallpaper-star-art-sky-night-people-silhouette-sky-graphy-space-anime-relaxing-night.jpg",
      desc: "It has been proven that immersing in the sounds of Mother Nature can significantly reduce stress hormones and boost a positive mind set. ",
    },
    {
      name: "Zenyoga",
      audio: "./meditationAudios/zenyoga.mp3",
      img: "https://e0.pxfuel.com/wallpapers/17/380/desktop-wallpaper-power-lines-sunset-artwork-anime-anime-girls-bicycle-utility-pole-fantasy-art-s-sunset-beautiful-girl-relaxing-music-sleep-transmission.jpg",
      desc: "For Zen Buddhists, meditation involves observing and letting go of the thoughts and feelings that arise in the mindstream, as well as developing insight into the nature of body and mind. Unlike many popular forms of meditation that focus on relaxation and stress relief, Zen meditation delves much deeper.",
    },
    {
      name: "Spritual",
      audio: "./meditationAudios/spritual.mp3",
      img: "https://e1.pxfuel.com/desktop-wallpaper/551/598/desktop-wallpaper-relaxing-moving-backgrounds-moving-fractal-art.jpg",
      desc: "Various sounds and musical vibrations and frequencies are played to facilitate mind, body and spiritual healing, such as the reduction of stress, promoting relaxation and balancing our body's energy centers, also known as chakras.",
    },
  ];

  let songs = document.getElementById("songs");
  for (let i = 0; i < playlist.length; i++) {
    let structure = `
        <div class="songbox">
            <img src="${playlist[i].img}" alt="">
            <p>${playlist[i].name}</p>
            <div class="playbutton" onclick="openplayer('${i}')"></div>
        </div>
        `;
    songs.innerHTML += structure;
  }

  function openplayer(id, start = true) {
    document.getElementById("player").style.top = "0vh";

    let plyimg1 = document.getElementById("plyimg1");
    let plyimg2 = document.getElementById("plyimg2");
    let plyh1 = document.getElementById("plyh1");
    let plyp = document.getElementById("plyp");
    let plaudio = document.getElementById("plaudio");

    plyimg1.src = playlist[id].img;
    plyimg2.src = playlist[id].img;
    plyh1.innerHTML = playlist[id].name;
    plyp.innerHTML = playlist[id].desc;
    plaudio.src = playlist[id].audio

    if (start) {
      plaudio.play();
    }
  }

  openplayer(0, false);

  function closeplayer() {
    document.getElementById("player").style.top = "200vh";
  }

  closeplayer();
</script>