<?php
require_once('../../config/connect.php');

// Définit des variables de session
$_SESSION['room'] = 'JohnDoe';

$sql = "UPDATE `room` SET `etat_r`=1 WHERE `etat_r`=0";
$query =mysqli_query($connection , $sql); 

if ($query == true ){
    echo 1;
}else
{
    echo 0;
}


?>