<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta cahrset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Style.css">
  </head>
  <body>
    <?php
    if(!isset($_SESSION['uid'])){
      ?>
      <script>
      location.replace("./login.html");
      </script>
      <?php
    }
     ?>
    <div class="header">
      <h2 class="logo"><a href="index.php">Question Web</a></h2>
      <input type="checkbox" id="chk">
      <label for="chk" class="show-menu-btn">
        <i class="fa fa-ellipsis-h"></i>
      </label>

      <ul class="menu">
        <?php
          if(isset($_SESSION['uid'])){
            echo "<a href='./logout.php'>".$_SESSION['uid']."</a>님";
          } else{
         ?>
          <a href="./login.html">Login</a>
        <?php
       }
         ?>
        <a href="index.php">Home</a>
        <a href="question.php">Question</a>
        <a href="free.php">Free</a>
        <label for="chk"  class="hide-menu-btn">
          <i class="fa fa-times"></i>
        </label>
      </ul>
    </div>
    <br><br><br>
    <div class-"content">
      <form align="center" method="POST" action="posting_process.php">
        <h2>FREE - 글쓰기<h2>
        제목: <input type="text" name="title" size="80"><br><br>
        <textarea cols="100" rows="20" name="content"></textarea><br>
        <input type="submit" value="완료"/>

      </form>
    </div>
