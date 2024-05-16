<?php
require_once('../../config/connect.php');

$title = $_GET['title'] ;
$descr = $_GET['descr'] ;
$maxnbr = $_GET['maxnbr'] ;
$quantite = $_GET['quantite'] ;
$price = $_GET['price'] ;
$id = $_GET['id'] ;

$sql = "UPDATE `room` SET `title`='$title',`def`='$descr',`maxNbr`='$maxnbr',`NumRooms`='$quantite',`RoomPrice`= '$price' ,`etat_r`= '0' WHERE `id`='".$id."'";
$query = mysqli_query($connection ,$sql) ;

if ($query == true) {
    echo 1;
} else {
    echo 0;
}

?>

