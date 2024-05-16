<?php
require_once('config/connect.php');

$id = $_GET['id'];
$adult = $_GET['adult'];
$child = $_GET['child'];
$nbrRoom = $_GET['nbrRoom'];
 if ($nbrRoom){
$sql = "UPDATE `reservation` SET `adult`='$adult', `child`='$child', `nbrRoom`='$nbrRoom' WHERE `id` = '".$id."' AND `etatRes`= '0' AND `Price-M` = '0'";
$query = mysqli_query($connection, $sql);


if ($query==true) {
    $sql1 = "SELECT * FROM `reservation` WHERE `id` = '".$id."' AND `etatRes`= '0' AND `Price-M` = '0'";
    $query1 = mysqli_query($connection, $sql1);
    $q = mysqli_fetch_array($query1);
    $roomid = $q['idroom'];

    $sql12 = "SELECT * FROM `room` WHERE `id` = '".$roomid."'";
    $query12 = mysqli_query($connection, $sql12);
    $q1 = mysqli_fetch_array($query12);
    $RoomPrice = $q1['RoomPrice'];
    
    if (isset($RoomPrice)) {
        // Code à exécuter lorsque la variable $i est définie
      
    echo $RoomPrice;}}
} 
?>



