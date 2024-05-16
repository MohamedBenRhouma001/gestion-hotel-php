<?php 


require_once('config/connect.php');



function verifnbrutil($connection, $checkin, $checkout, $id) {
    $sqlf1  = "SELECT SUM(nbrRoom) as nbrutil FROM  reservation WHERE idroom='".$id."' AND `etatRes`='1' AND checkin <= '".$checkout."' AND checkout  >= '".$checkin."' ";
    $queryf1 = mysqli_query($connection, $sqlf1) ;
    if(mysqli_num_rows($queryf1) > 0){
        $rowf1 = mysqli_fetch_array($queryf1);
        return $rowf1['nbrutil'];
    } else {
        return 0;
    }
}



function  verifnbrtotal($connection ,$id){
    $sqlf2  = "SELECT *  FROM  room WHERE id='".$id."' ";
    $queryf2 = mysqli_query($connection, $sqlf2) ;
    if(mysqli_num_rows($queryf2) > 0){
        $rowf2 = mysqli_fetch_array($queryf2);
        return $rowf2['NumRooms'];
    } else {
        return 0;
    }

}



$id = $_GET['id'] ;

$sqlf11  = "SELECT * FROM  reservation WHERE id='".$id."' ";
    $queryf11 = mysqli_query($connection, $sqlf11) ;
    if(mysqli_num_rows($queryf11) > 0){
        $rowf11 = mysqli_fetch_array($queryf11);
       $checkin = $rowf11['checkin'];
       $checkout = $rowf11['checkout'];
       $topicID = $rowf11['idroom'];
       $rooms = $rowf11['nbrRoom'];

if ((verifnbrtotal($connection ,$topicID) - verifnbrutil($connection, $checkin, $checkout, $topicID)) >=$rooms ) {

    $Update = "UPDATE `reservation` SET `etatRes`='1' WHERE id='".$id."' ";
            $Update_q = mysqli_query($connection ,$Update) ;
echo 1;
}else {
echo 0;
}


    }else echo 2;

?>