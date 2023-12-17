<?php include('./component/top.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yoga community</title>
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

  .forum .heading {
    padding: 20px;
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .forum .heading h1 {
    font-size: 22px;
  }

  .forum .heading .search input {
    width: 500px;
    padding: 10px;
    border: 1px solid black;
    background: transparent;
    border-radius: 5px;
    max-width: 100%;
  }

  .forum .heading .search input::placeholder {
    color: black;
  }

  @media(width<600px) {
    .forum .heading {
      flex-direction: column;
      width: 100%;
      align-items: start;
      justify-content: start;
      margin-top: 10px;
    }

    .forum .heading .search input {
      width: 100%;
      min-width: 260px;
      margin-top: 20px;
    }
  }

  .forumbox {
    display: flex;
    align-items: start;
    padding: 20px;
    gap: 10px;
    background: whitesmoke;
    border-radius: 10px;
    flex-direction: row-reverse;
  }

  .forumbox .info {
    min-width: 250px;
    background: white;
    border-radius: 10px;
    padding: 10px;
    max-width: 250px;
    border: 1px solid rgba(128, 128, 128, 0.33);
  }

  .forumbox .info button {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background-color: orange;
  }

  .forumbox .info .card {
    margin-top: 20px;
    overflow: hidden;
    border-radius: 10px;
    padding: 0;
    font-size: 15px;
    text-align: center;

  }

  .forumbox .info .card img {
    width: 100%;
    object-fit: cover;
    height: 100%;
  }

  .forumbox .questions {
    width: 100%;
  }

  .forumbox .questions ol {
    background: white;
    padding: 0;
    margin: 0;
    margin-top: 20px;
    border: 1px solid rgba(128, 128, 128, 0.33);
    border-radius: 10px;
    max-height: 500px;
    overflow: scroll;
  }

  .forumbox .questions ol li {
    list-style: none;
    padding: 15px;
    border-bottom: 1px solid grey;
  }

  .forumbox .questions ol li summary {
    font-size: 15px;
    color: rgb(85, 84, 84);
    font-weight: 600;
  }

  .forum .questions ol li p.name {
    font-size: 14px;
    opacity: 80%;
  }

  .forum .questions ol li p.reply {
    margin-top: 10px;
  }

  .forum .questions ol li p.reply a {
    color: rgb(0, 106, 255);
    font-size: 13px;
    display: inline-block;
    padding: 3px 15px;
    background: rgba(0, 106, 255, 0.108);
    margin-right: 20px;
  }

  @media(width<600px) {
    .forumbox {
      flex-direction: column;
    }

    .forumbox .questions {
      padding: 0px;
      margin-top: 20px;
    }

    .forumbox .info {
      max-width: 100%;
      display: flex;
      flex-direction: column-reverse;
      gap: 10px;
    }

    .forum .heading .search {
      min-width: 100%;
    }
  }

  .askform {
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff55;
    backdrop-filter: blur(6px);
    display: none;
  }

  .askform form {
    width: 100%;
    max-width: 400px;
    background-color: whitesmoke;
    padding: 10px;
  }

  .askform form input {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #000;
    background: transparent;
    border-radius: 5px;
  }

  .askform form .btn {
    display: flex;
    margin-top: 10px;
    gap: 10px;
  }

  .askform form .btn div,
  .askform form .btn button {
    width: 100%;
    background: orange;
    padding: 10px;
    text-align: center;
    font-size: 15px;
    border: 1px solid orange;
    cursor: pointer;
    border-radius: 5px;
  }

  .askform form .btn div {
    background-color: transparent;
    border: 1px solid orange;
    color: orange;
  }

  .reply li p {
    font-size: 14px;
  }
</style>

<body>
  <?php include('component/nav.php'); ?>

  <div class="container">
    <div class="forum">
      <div class="heading">
        <span>
          <h1>Yoga forum</h1>
          <p>
            question related to yoga
          </p>
        </span>

        <div class="search">
          <input placeholder="search" type="text">
        </div>
      </div>

      <div class="forumbox">
        <div class="info">
          <button onclick="questionform('flex')">Ask Question</button>
          <div class="card">
            <img
              src="https://img.freepik.com/free-vector/silhouette-female-yoga-pose-against-mandala-design_1048-13082.jpg?w=740&t=st=1693738484~exp=1693739084~hmac=9166261874ae420577df0cdf3c9df52c54438cfed17e4e13388dec770935d088"
              alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>

        <?php include('./php/questions.php'); ?>

        <div class="questions">
          <h3>Questions</h3>
          <ol>

            <?php
            while ($row = $result->fetch_assoc()) {
              $questionText = $row['question'];
              $username = $row['username'];
              $timestamp = $row['time'];
              $questionID = $row['id'];
              $replies = getreply($questionID);
              $repliesCount = count($replies);

              echo '<li><details>';
              echo '<summary>' . htmlspecialchars($questionText);
              echo '<p class="name"><small>by - ' . htmlspecialchars($username) . '</small></p>';
              echo '<p class="posted-time"><small>Posted on: ' . date("F j, Y, g:i a", strtotime($timestamp)) . '</small></p>';
              echo '<p class="reply"><a onclick="replyquestionform(\'flex\',\'' . $questionID . '\',\'' . $questionText . '\')">Reply</a><small>' . $repliesCount . ' replies</small></p></summary>';

              if (!empty($replies)) {
                echo '<br/><p><b><small>Replies</small></b>:</p>';

                foreach ($replies as $reply) {
                  echo '<li><p><b>' . htmlspecialchars($reply['reply']) . '</b></p>';
                  echo '<p class="name"><small>by - ' . htmlspecialchars($reply['username']) . '</small></p>';
                  echo '<p class="posted-time"><small>Posted on: ' . date("F j, Y, g:i a", strtotime($reply['time'])) . '</small></p>';
                  echo '</li>';
                }
                echo '</ul>';
              }

              echo '</details></li>';
            }
            ?>

          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="askform" id="askform">
    <form action="php/askquestion.php" method="post">
      <h2>Ask a question</h2>
      <input type="text" name="question" placeholder="question">
      <div class="btn">
        <div onclick="questionform('none')">cancel</div>
        <button>submit</button>
      </div>
    </form>
  </div>

  <div class="askform" id="replyform">
    <form action="php/replyquestion.php" method="post">
      <h2>reply to : <span id="replyquestion"></span></h2>
      <input type="hidden" name="replyid" id="replyid">
      <input type="text" name="reply" placeholder="your reply">
      <div class="btn">
        <div onclick="replyquestionform('none')">cancel</div>
        <button>submit</button>
      </div>
    </form>
  </div>

  <script>
    let login = <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
      echo 'true';
    } else {
      echo 'false';
    } ?>

    function questionform(state) {
      if (login) {
        askform.style.display = state;
      }
      else {
        alert('login first');
      }
    }

    function replyquestionform(state, id, question) {
      if (login) {
        if (state == 'flex') {
          replyform.style.display = state;
          replyid.value = id;
          replyquestion.innerText = question;
        } else {
          replyform.style.display = state;
          replyid.value = '';
          replyquestion.innerText = '';
        }
      }
      else {
        alert('login first');
      }
    }
  </script>
</body>

</html>