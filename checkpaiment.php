<?php
require_once('config/connect.php');
$roomid = $_GET['id'] ;




if(isset($_GET['etat'])){
    $etat = $_GET['etat'];
}else{
    $etat = 0 ;
}
function count_paid_rooms($con ,$id){
    $sql = "SELECT * FROM reservation WHERE idroom = '".$id."' AND etatRes ='1'" ;
    $query = mysqli_query($con ,$sql) ;
    $reserverd_num = 0 ;
    if(mysqli_num_rows($query) > 0){
        while($rows = mysqli_fetch_array($query)){
          $reserverd_num = $reserverd_num + $rows['nbrRoom'] ;
        
        }
    } 
    return $reserverd_num ;

}

function count_all_rooms($con ,$id){
    $sql = "SELECT * FROM room WHERE id ='".$id."'" ;
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        
        return $row['NumRooms'] ;
    }

}

function myroom($con ,$id){
  $sql ="SELECT * FROM reservation   WHERE idroom='".$id."'   AND idclient='".$_SESSION['id']."'  AND etatRes='0' ";
 
  $query = mysqli_query($con ,$sql)or die("error") ;
  if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_array($query);
    $number = $row['nbrRoom'] ;  
    return $number ;
  }

}
/*succefil payment 8alta lena ye3mel update 3la kol reservation normalement ba3ed where tel8a idreservation*/
function succefullPaiment($con, $id){
    $sql = "UPDATE `reservation` SET `etatRes`='1' WHERE `idroom`='".$id."' AND `idclient` = '".$_SESSION['id']."'" ;
    $query = mysqli_query($con ,$sql) or die('error2') ;
    if($query == true){
        return 1 ;
    }
    else{
        return 0 ;
    }
}
  $allRooms = count_all_rooms($connection ,$roomid) ;
  $paidRooms = count_paid_rooms($connection ,$roomid) ;
  $numberIwant =  myroom($connection ,$roomid) ;

  $emptyRooms = $allRooms - $paidRooms ;

  if($numberIwant > $emptyRooms){
     /*  Error   */
     echo 0 ;
  }else{
    $update = succefullPaiment($connection ,$roomid) ;
    if($update == 1){
        if($etat == 1){
            echo $_SESSION['id'] ;
        }else{
         echo 1 ;
        }
    }
    else{
        echo 0 ;
    }
     
  }



?>