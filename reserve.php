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
        $userid = $_SESSION['id'];
        $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND checkout >'0000-00-00'" ;
        $query = mysqli_query($connection ,$sql) ;
        if(mysqli_num_rows($query) > 0){
            $i=0;
            $reserve="reserve";
            while($q = mysqli_fetch_array($query)){
                $i=$i+1;
                $roomid = $q['idroom'] ;
                $nbrRoom = (int) $q['nbrRoom'] ;
                $Price = (int) $q['Price-M'] ;
                $disc = $q['codePromo'] ;
                $Price_m=0;
                $Price_m = $nbrRoom * $Price ;
                $Price_m =  $Price_m * (1 - ($disc * 0.01));

                $sql2 = "SELECT * FROM room WHERE id='".$roomid."'" ;
                $query2 = mysqli_query($connection ,$sql2) ;
                if(mysqli_num_rows($query2) > 0){
                    $room = mysqli_fetch_array($query2) ;
                    $roomName = $room['title'] ;
                    $image = $room['image'] ;
                    echo '
                  <div class="cont-item "  data-aos="fade-right">
                    <div class="lig-item head-title tit-des id1">
                        <div class="lig-item-img"><img src="' . GetFirstImag($image) . '"></div>
                        <div class="lig-item-des">' . $roomName . '</div>
                    </div>
                    <div class="lig-item head-title">' . $Price . ' DT</div>
                    <div class="lig-item head-title">' . $nbrRoom . '</div>
                    <div class="lig-item head-title">' . $Price_m . ' DT</div>
                    <div class="lig-item head-title">
                        <div class="dropdown">
                            <button class="dropdown-toggle" onclick="verifetatpar('.$i.')">&#8226;&#8226;&#8226;</button>
                            <div class="dropdown-menu'.$i.'  style-dropdown-menu">
                                <button onclick="deleteResevation('.$q['id'].', \''.$reserve.'\') ">Supprimer</button>
                                <button onclick="return1(' . $q['id'] . ')">Modifier</button>
                                <button onclick="gopay(' . $q['id'] . ')">Confirmer</button>
                            </div>
                        </div>
                    </div>                    
                   </div>
                ';
                




            } ;
           
        }
    }
    else{
        echo '<div class="erreurRooms">There is no rooms has been resereved .</div>' ;
    }
}elseif($mode = "checkinRes"){
 $id = $_GET['id'] ;
 $sql = "UPDATE
 `reservation`
SET
`etatRes` = '1'
WHERE
`id` = '".$id."'
";
$query = mysqli_query($connection ,$sql) ;
if($query == true){
    echo $_SESSION['id'] ;
}else{
    echo false ;
}


}
}
?>