<?php
require_once('../../config/connect.php');
$tag = $_GET['tag'] ;

$sql = "SELECT * FROM `room` WHERE etat_r = 0 " ;
$query = mysqli_query($connection ,$sql) or die('error');
if(mysqli_num_rows($query)){

if($tag !== 'insert'){
    $pic = mysqli_fetch_array($query) ;
    $p = $pic['image'] ;
    echo $p ;

}

if($tag == 'insert'){
    $link = $_GET['link'] ;
    $pi = mysqli_fetch_array($query) ;
    $pe = $pi['image'].'+' ;
    $res = $pe.$link ;
    $id = $pi['id'] ;
    $sqlUpdate = "UPDATE `room` SET `image`='$res' WHERE `id` = $id"; 
    $do = mysqli_query($connection ,$sqlUpdate) or die ('error') ;
    if($do == true){
        echo 1 ;
    }
    else{
        echo 0 ;
    }
}



}
?>