<?php
  session_start();
  $title = $_POST['title'];
  $content = $_POST['content'];
  $nalzza = date('Y-m-d H:i:s');
  if(isset($_SESSION['uid'])){
    $writer = $_SESSION['uid'];
  }
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $posting = "INSERT INTO free (title, writer, content, nalzza)";
  $posting = $posting."values('$title','$writer','$content','$nalzza')";
  $result = $connect->query($posting);
  if($result){
 ?>
    <script>
      location.replace("./free.php");
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
