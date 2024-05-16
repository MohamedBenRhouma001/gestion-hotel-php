<?php
require_once('../../config/connect.php');
$sql = "SELECT * FROM contact WHERE msg_red = 0 AND mail_emateur > 0 " ;
$query = mysqli_query($connection ,$sql) ;
echo mysqli_num_rows($query) ;

?>