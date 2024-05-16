<?php
require_once('../../config/connect.php');
$id = $_GET['id'] ;

$sql = "DELETE FROM `contact` WHERE `id`=".$id." " ;
$query = mysqli_query($connection, $sql) ;
if($query == true){
    echo 1 ;    
}else{
    echo 0 ;
}

?>