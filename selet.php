<?php
require_once('config/connect.php') ;

function GetFirstImag($link){
    $length = strlen($link) ;
    $result = '' ;
    for($i = 1 ; $i < $length ; $i++){
        $charnow = $link[$i] ;
        if($charnow !== '+'){
            $result = $result.''.$charnow ;
        }
        else{
            return $result ;
            exit ;
        }
  
    }
  
  }

if(isset($_GET['mode'])){
    $mode = $_GET['mode'] ;
    if($mode == "check"){
        $userid = $_SESSION['id'] ;
        $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND `Price-M`='0' " ;
        $query = mysqli_query($connection ,$sql) ;
        if(mysqli_num_rows($query) > 0){
            $select="select";
            while($q = mysqli_fetch_array($query)){
                $id = $q['id'] ;
                $roomid = $q['idroom'] ;
                $sql2 = "SELECT * FROM room WHERE id='".$roomid."'" ;
                $query2 = mysqli_query($connection ,$sql2) ;
                if(mysqli_num_rows($query2) > 0){
                    $room = mysqli_fetch_array($query2) ;
                    $roomName = $room['title'] ;
                    $image = $room['image'] ;
                    $Price = (int) $room['RoomPrice'] ;
                    
                echo'
                <div class="cont-item "  data-aos="fade-right">
                <div class="lig-item head-title" >'.$id.'</div>
                <div class="lig-item head-title tit-des id1 " >
                  <div class="lig-item-img"><img src="' . GetFirstImag($image) . '"></div>
                  <div class="lig-item-des">'.$roomName.' </div>    
                </div>
                <div class="lig-item head-title   reglage" >'.$Price.' DT</div>
                <div class="lig-item head-title" ><button class="ignore" ><img src="https://img.icons8.com/sf-regular-filled/48/737373/x.png" onclick="deleteResevation('.$q['id'].', \''.$select.'\')"/></button></div>
                    
              </div>
              </div>
                ';


            } ;
           
        }
    }
    else{
        echo '<div class="erreurRooms">Aucune chambre n a ete réservee .</div>' ;
    }
}
}
?>