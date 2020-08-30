<?php
  session_start();
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $show_question = "select * from question order by qnum desc";
  $result = $connect->query($show_question);
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
<button type="button" onclick="location.href='ask.php'" style="float: right;">글쓰기</button>
<br><br><br>
<h3 style="margin-left:30px">QUESTION</h3>
    <div class="content">
      <table border="1">
        <thead align="center">
          <tr>
            <td width="50">번호</td>
            <td width="500">제목</td>
            <td width="100">작성자</td>
            <td width="200">날짜</td>
            <td width="50">추천</td>
            <td width="50">조회수</td>
          </tr>
        </thead>
        <tbody>
          <?php
          while($questions = mysqli_fetch_assoc($result)){
            ?>
            <tr>
              <td width="50" align="center"><?php echo $questions['qnum']; ?></td>
              <td width="500" align="center"><?php echo $questions['title']; ?></td>
              <td width="100" align="center"><?php echo $questions['writer']; ?></td>
              <td width="200" align="center"><?php echo $questions['nalzza']; ?></td>
              <td width="50" align="center"><?php  echo $questions['recommendation']; ?></td>
              <td width="50" align="center"><?php echo $questions['views']; ?></td>
            </tr>
            <?php
          }
           ?>
        </tbody>

      </table>

      </div>

  </body>
</html>
