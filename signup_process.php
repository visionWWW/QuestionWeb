<?php


    $nid=$_POST['newbie_id'];
    $npw=$_POST['newbie_pw'];
    $nname=$_POST['newbie_name'];
    $nemail=$_POST['newbie_email'];
    if($_POST['newbie_tel']){
      $ntel=$_POST['newbie_tel'];
    }

    $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
    $check_query = "SELECT * FROM user WHERE id='$nid'";
    $check_res=mysqli_fetch_array(mysqli_query($connect,$check_query));
    if($check_res['id']){
?>
      <script>
      alert("이미 있는 아이디입니다.");
      location.replace("./signup.html");
      </script>
<?php
    }
    else{
      $signup = "INSERT INTO user (name, id, passwd, email, tel_num)";
      $signup = $signup."values('$nname','$nid','$npw','$nemail','$ntel')";
      $result = $connect->query($signup);
      if($result){
?>
      <script>
        alert("가입 완료");
        location.replace("./login.html");
      </script>
<?php
    }
    else{
?>
      <script>alert("실패하였습니다.");</script>
<?php
    }
  }
  mysqli_close($connect);
?>
