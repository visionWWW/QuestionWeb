<?php
session_start();
$logout_res = session_destroy();
if($logout_res){
 ?>
 <script>history.back();</script>
<?php } ?>
