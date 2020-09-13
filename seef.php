<?php
  session_start();
/*
  if(!isset($_SESSION['uid'])){
    ?>
    <script> location.href='login.html';</script>
    <?php
  }
  이거는 나중에 최종적으로 서버 연결이 됐을 때 주석 해제하자. 로그인 안 한 사람들 쫓아내는 코드야!
  */
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $see_free = "select * from free where fnum=".$_GET['num'];
  $num = $_GET['num'];
  $id="guest";
  $result=mysqli_fetch_array(mysqli_query($connect, $see_free));
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
  <body>

    <div class="header" style="padding-top: 20px;">
      <div class="search" >
        <form method="GET" action="search.php">
          <input type="submit" value="검색" style="float: right; padding: 3px;">
          <input type="text" name="keyword" placeholder="검색어를 입력해주세요." style="display:inline-block; font-size:15px; padding:2px; float: right;">
        </form>
    </div>
    <div class="header">
      <h2 class="logo"><a href="index.html">Question Web</a></h2>
      <input type="checkbox" id="chk">
      <label for="chk" class="show-menu-btn">
        <i class="fa fa-ellipsis-h"></i>
      </label>

      <ul class="menu">
        <?php
          if(isset($_SESSION['uid'])){
            $id = $_SESSION['uid'];
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

    <div class="content" style="color:black;">
      <h3><?php echo $result['title']; ?></h3>
      <?php
      if($id == $result['writer']){
        echo "<a href='modf.php?num=$num'><button>수정</button></a>";
        echo "<form method='POST' action='delf.php'>
        <input type='hidden' name='num' value=$num>
        <input type='submit'value='삭제' onclick='confirm(\"삭제하시겠습니까?\")'></form>";
      }
       ?>

      <div>
        <?php echo $result['content']; ?>
      </div>
      </div>

  </body>
</html>
