<?php
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $title = $_POST['title'];
  $content = $_POST['content'];
  $num = $_POST['num'];
  $mod_query = "update free set title='$title', content='$content' where fnum=$num";
  if(mysqli_query($connect, $mod_query)){
   ?>
  <script>location.href='seef.php?num=<?php echo $num; ?>';</script>
  <?php
  }
  else{
    ?>
    <script>alert("수정 실패");</script>
    <script>location.href='free.php';</script>
    <?php
  }
     ?>
