<?php
require_once('concat_function.php');
$id = $_GET['id'] ;
$tag = $_GET['tag'] ;
$sql_alluserid = "SELECT * FROM `client` WHERE id = '".$id."'" ;
$query_user = mysqli_query($connection ,$sql_alluserid) or die(mysqli_error($sql_alluserid)) ;

    $row = mysqli_fetch_array($query_user) ;
    switch($tag){
        case "username":
            echo $row['nom'] ;
            break ;
        case "image":
            echo $row['photo'] ;
            break ;
        case "email":
            echo $row['mail'] ;
    }





?>