<?php 


require_once('config/connect.php');
$checkin = $_GET['checkin'] ;
$checkout = $_GET['checkout'] ;
$topicID = $_GET['id'] ;
$rooms = $_GET['rooms'] ;
$id = $_SESSION['id'] ;



function verifnbrutil($connection, $checkin, $checkout, $id) {
    $sqlf1  = "SELECT SUM(nbrRoom) as nbrutil FROM  reservation WHERE idroom='".$id."' AND `etatRes`='1' AND checkin <= DATE_ADD('".$checkin."', INTERVAL '".$checkout."' DAY) AND DATE_ADD(checkin, INTERVAL '".$checkout."' DAY)  >=  DATE_ADD('".$checkin."', INTERVAL '".$checkout."' DAY)";
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


if ((verifnbrtotal($connection ,$topicID) - verifnbrutil($connection, $checkin, $checkout, $topicID)) >=$rooms ) {

    $Update = "UPDATE `reservation` SET `etatRes`='1' WHERE idclient='".$_SESSION['id']."' AND idroom='".$topicID."' AND `etatRes`='0' AND `checkout`>'0' ";
            $Update_q = mysqli_query($connection ,$Update) ;
echo 1;
}else {
echo 0;
}




?>
