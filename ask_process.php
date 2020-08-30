<?php
  session_start();
  $title = $_POST['title'];
  $content = $_POST['content'];
  $nalzza = date('Y-m-d H:i:s');
  if(isset($_SESSION['uid'])){
    $writer = $_SESSION['uid'];
  }
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $ask = "INSERT INTO question (title, writer, content, nalzza)";
  $ask = $ask."values('$title','$writer','$content','$nalzza')";
  $result = $connect->query($ask);
  if($result){
 ?>
    <script>
      location.replace("./question.php");
    </script>
<?php
  }
  else{
?>
  <script>alert("실패하였습니다.");</script>
<?php
  }
mysqli_close($connect);
?>
