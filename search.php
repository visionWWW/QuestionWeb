<?php
  session_start();
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $searchword = $_GET['keyword'];
  $show_searchf = "select * from free where content like '%$searchword%' or title like '%$searchword%'order by fnum desc";
  $resultf = $connect->query($show_searchf);
  $show_searchq = "select * from question where content like '%$searchword%' or title like '%$searchword%'order by qnum desc";
  $resultq = $connect->query($show_searchq);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Style.css">
  </head>
  <style>
    .form{
      width: 1000px;
    }
    .form > div {
      display: flex;
      justify-content: center;
      padding-bottom: 7px;
      align-items: center;
    }
    .menu{
      clear: right;
      float: right;
      line-height: 100px;
    }
  </style>

  <body>

    <div class="header" style="padding-top: 20px;">
      <div class="search" >
        <form method="GET" action="search.php">
          <input type="submit" value="검색" style="float: right; padding: 3px;">
          <input type="text" name="keyword" placeholder="검색어를 입력해주세요." style="display:inline-block; font-size:15px; padding:2px; float: right;">
        </form>
      </div>
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
    <div style="padding-top: 10px;padding-left: 50px;">
      <?php
      echo "<h2>\"$searchword\"의 검색결과입니다.</h2>";
       ?>
      <div style="padding-top: 10px;width:50%;float:left;">
       <?php echo "<h2>Question</h2><br>"; ?><?php
       while($questions = mysqli_fetch_assoc($resultq)){
         ?>
         <div class="nope" style="padding-bottom:10px;">
           <a href="seeq.php?num=<?php echo $questions['qnum']; ?>"><h3>
             <?php echo $questions['title']; ?></h3>
           <span width="100" align="center"><?php echo $questions['writer']; ?></span>
           <span width="200" align="center"><?php echo $questions['nalzza']; ?></span>
           <br>
           <span width="100" align="center"><?php echo $questions['content']; ?></span></a>
         </div>
         <?php
       }
        ?>
     </div >
     <div style="padding-top: 10px;width:50%;float:right;">
       <?php echo "<h2>Free</h2><br>"; ?><?php
       while($frees = mysqli_fetch_assoc($resultf)){
         ?>
         <div class="nope" style="padding-bottom:10px;">
           <a href="seeq.php?num=<?php echo $frees['fnum']; ?>"><h3>
             <?php echo $frees['title']; ?></h3>
           <span width="100" align="center"><?php echo $frees['writer']; ?></span>
           <span width="200" align="center"><?php echo $frees['nalzza']; ?></span>
           <br>
           <span width="100" align="center"><?php echo $frees['content']; ?></span></a>
         </div>
         <?php
       }
        ?>
    </div>
    </div>
</body>
