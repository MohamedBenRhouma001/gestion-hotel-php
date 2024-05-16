<?php
require_once('config/connect.php');
$roomid = $_GET['id'] ;

function getroomsnumber($con , $id){
    $sql = "SELECT * FROM room  WHERE id='".$id."'" ;
    $query = mysqli_query($con ,$sql);
    if(mysqli_num_rows($query) > 0){
        $room = mysqli_fetch_array($query);
        return $room['NumRooms'] ;
    }
}

function calcule_res_num($con ,$id){
    $sql_res = "SELECT * from  reservation WHERE etatRes = '1' AND idroom='".$id."'" ;
    $query_res = mysqli_query($con ,$sql_res) ;
    $reserverd_num = 0 ;
    if(mysqli_num_rows($query_res) > 0){
        while($rows = mysqli_fetch_array($query_res)){
          $reserverd_num = $reserverd_num + $rows['nbrRoom'] ;
        
        }
    } 
    return $reserverd_num ;
}


echo  calcule_res_num($connection ,$roomid) - getroomsnumber($connection ,$roomid) ;
?>