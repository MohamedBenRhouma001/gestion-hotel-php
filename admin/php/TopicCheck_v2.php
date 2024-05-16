<?php
require_once('../../config/connect.php');
$tag = $_GET['tag'] ;

$sql = "SELECT * FROM `room` WHERE etat_r = 0 " ;
$query = mysqli_query($connection ,$sql) or die('error');
if(mysqli_num_rows($query)){

if($tag == 'pic'){
    $pic = mysqli_fetch_array($query) ;
    $p = $pic['carract'] ;
    echo $p ;

}

if($tag == 'insert'){
    $link = $_GET['link'] ;
    $pi = mysqli_fetch_array($query) ;
    $pe = $pi['carract'];
    if ($pe == ''){
        $pe = '+' ;
    }

    $res = $pe.$link ;
    $res1 = $res.'+' ; 
    $id = $pi['id'] ;
    $sqlUpdate = "UPDATE `room` SET `carract`='$res1' WHERE `id` = $id"; 
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