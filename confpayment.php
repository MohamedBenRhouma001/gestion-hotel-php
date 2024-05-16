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

function verif($connection) {
    $sqlf3 = "SELECT * FROM reservation WHERE idclient='" . $_SESSION['id'] . "' AND `etatRes`='0' AND `checkout`>'0000-00-00' AND `nbrRoom`>'0'";
    $queryf3 = mysqli_query($connection, $sqlf3);

    if (mysqli_num_rows($queryf3) > 0) {
        while ($rowf3 = mysqli_fetch_array($queryf3)) {
            $checkin = $rowf3['checkin'];
            $checkout = $rowf3['checkout'];
            $topicID = $rowf3['idroom'];
            $rooms = $rowf3['nbrRoom'];
            $id = $rowf3['idroom'];

            $nbrutil = verifnbrutil($connection, $checkin, $checkout, $id);
            $nbrtotal = verifnbrtotal($connection, $id);
            $nbrdispo = $nbrtotal - $nbrutil;

            if ($nbrdispo < $rooms) {
                return "id: " . $id;
            }
        }
        return "succès";
    }
}



if (verif($connection) == "succès") {
    $Update = "UPDATE `reservation` SET `etatRes`='1' WHERE idclient='" . $_SESSION['id'] . "' AND `etatRes`='0' AND `checkout`>'0000-00-00' AND `nbrRoom`>'0'";
    $Update_q = mysqli_query($connection, $Update) or die("Erreur dans la requête de mise à jour");
    
    if ($Update_q == true) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo verif($connection);
}

