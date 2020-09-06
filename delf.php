<?php
$connect = mysqli_connect('localhost', 'root', '3190024jina', 'questionweb');
$num = $_POST['num'];
$del_query = "delete from free where fnum=$num";

if(mysqli_query($connect, $del_query)){
 ?>
<script>location.href='free.php';</script>
<?php
}
else{
  ?>
  <script>alert("삭제 실패");</script>
  <script>location.href='free.php';</script>
  <?php
}
   ?>
