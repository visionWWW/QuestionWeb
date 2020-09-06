<?php
  $connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
  $title = $_POST['title'];
  $content = $_POST['content'];
  $num = $_POST['num'];
  $mod_query = "update question set title='$title', content='$content' where qnum=$num";
  if(mysqli_query($connect, $mod_query)){
   ?>
  <script>location.href='seeq.php?num=<?php echo $num; ?>';</script>
  <?php
  }
  else{
    ?>
    <script>alert("수정 실패");</script>
    <script>location.href='question.php';</script>
    <?php
  }
     ?>
