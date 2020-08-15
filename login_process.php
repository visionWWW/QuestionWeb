<?php

  session_start();

    $uid=$_POST['id'];
    $upw=$_POST['pw'];

    $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
    $login_query = "SELECT * FROM user WHERE id='$uid' && passwd='$upw'";
    $res=mysqli_fetch_array(mysqli_query($connect,$login_query));
    if($res['passwd']== $upw){
      $_SESSION['uid']=$uid;
      ?>
      <script>
        location.replace("./index.php");
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

 ?>
