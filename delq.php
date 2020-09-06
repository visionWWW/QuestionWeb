<?php
$connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
$num = $_POST['num'];
$del_query = "delete from question where qnum=$num";

if(mysqli_query($connect, $del_query)){
 ?>
<script>location.href='question.php';</script>
<?php
}
else{
  ?>
  <script>alert("삭제 실패");</script>
  <script>location.href='question.php';</script>
  <?php
}
   ?>
