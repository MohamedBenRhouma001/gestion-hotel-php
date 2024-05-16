<?php
require_once('../../config/connect.php');
$sql="SELECT * FROM `app` ";
$query=mysqli_query($connection ,$sql);
while( $row = mysqli_fetch_array($query)){
    echo $row[0].'+'.$row[1].'+'.$row[2].'+'.$row[3];
}
?>