<?php
require_once('config/connect.php');
$id = $_GET['id'] ;
$userid = $_SESSION['id'];


$sql = "DELETE FROM `reservation` WHERE `id`='".$id."'";
mysqli_query($connection ,$sql) ;


if(isset($_GET['type'])){

$type = $_GET['type'];

if($type=="select"){
$sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND `Price-M`='0' " ;
$query = mysqli_query($connection ,$sql) ;
if(mysqli_num_rows($query) > 0){
 echo 1;}else{echo 0;}
}
 
if($type=="reserve"){
 $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND checkout >'0000-00-00'" ;
 $query = mysqli_query($connection ,$sql) ;
 if(mysqli_num_rows($query) > 0){
  echo 1;}else{echo 2;}
}

}

?>