<?php
require_once('../../config/connect.php');

$title = $_GET['title'] ;
$descr = $_GET['descr'] ;
$maxnbr = $_GET['maxnbr'] ;
$quantite = $_GET['quantite'] ;
$price = $_GET['price'] ;
$etat = 0 ;

$sql = "INSERT INTO `room` (`title`, `def`, `etat_r`,`maxNbr`, `NumRooms`, `RoomPrice`) VALUES ('$title', '$descr', '$etat' ,'$maxnbr','$quantite','$price')";
$query = mysqli_query($connection ,$sql) ;

if ($query == true) {
    echo 1;
} else {
    echo 0;
}

?>