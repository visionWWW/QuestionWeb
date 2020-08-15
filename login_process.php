<?php

  session_start();
    $connect = mysqli_connect('localhost', '', '', '') or die("fail");

  if(isset($_POST['id'])&&isset($_POST['passwd'])){
    $uid=$_POST['id'];
    $upasswd=$_POST['passwd'];

    $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
    $login_query = "SELECT * FROM user WHERE id='$uid' && passwd='$upasswd'";

    if($res=mysqli_fetch_array(mysqli_query($connect,$login_query))){
      ?>
      <script>
        location.replace("./index.html");
      </script>
<?php
    }
    else{?>
      <script>
        alert("아이디와 비밀번호를 확인하세요.");
        history.back();
      </script>
    <?php
    }
  }
 ?>
