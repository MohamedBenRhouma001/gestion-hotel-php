<?php
require_once('config/connect.php') ;
if(isset($_GET['mode'])){
    $mode = $_GET['mode'] ;
    if($mode == "check"){
        $userid = $_GET['id'] ;
        $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '1'" ;
        $query = mysqli_query($connection ,$sql) ;
        if(mysqli_num_rows($query) > 0){
            while($q = mysqli_fetch_array($query)){
                $roomid = $q['idroom'] ;
                $checkin = $q['checkin'] ;
                $checkout = $q['checkout'] ;
                $sql2 = "SELECT * FROM room WHERE id='".$roomid."'" ;
                $query2 = mysqli_query($connection ,$sql2) ;
                if(mysqli_num_rows($query2) > 0){
                    $room = mysqli_fetch_array($query2) ;
                    $roomName = $room['title'] ;
                echo'
                <div class="val-col">
                <p class="pod"id="text">  '.$roomName.'  </p>
                <p class="pod"id="text">  '.$q['Price-M'].' </p>
                <p class="pod"id="text">  '.$checkin.' </p>
                <p class="pod"id="text">  '.$checkout.' </p>
              </div>
                ';




            } ;
           
        }
    }
    else{
        echo 'There is no rooms has been resereved' ;
    }
}
}
?>