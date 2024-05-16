<?php
require_once('config/connect.php') ;
$activity = $_GET['activity'] ;
$Plats = $_GET['Plats'] ;
$bed = $_GET['bedTyp'] ;
$checkin = $_GET['checkin'] ;
$checkout = $_GET['checkout'] ;
$discount = $_GET['discount'] ;


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

function verif($con, $checkout, $checkin, $id) {
    $sqlf3 = "SELECT * FROM reservation WHERE id='".$id."'";
    $queryf3 = mysqli_query($con, $sqlf3);

    if (mysqli_num_rows($queryf3) > 0) {
        $rowf3 = mysqli_fetch_array($queryf3);
        $id = $rowf3['idroom'];
        $nbrutil = verifnbrutil($con, $checkin, $checkout, $id);
        $nbrtotal = verifnbrtotal($con, $id);
        $nbrdispo = $nbrtotal - $nbrutil;

        if ($nbrdispo <= 0) {
            return "id='".$id."'";
        }

        return "success";
    }
}


function getpromocode ($connection ,$code) {


    if(!empty($code)){
        $sql = "SELECT * FROM promo WHERE code_promo = '".$code."'AND durer > NOW()" ;
        $query = mysqli_query($connection, $sql) ;
        if(mysqli_num_rows($query) > 0){
            $promo = mysqli_fetch_array($query) ;
            $disc = $promo['prix_promo'] ;
            return  $disc ;
        }
        else{
            return 0 ;
        }
    }


}


function calculbonis($activity ,$Plats ,$bed){
    $x =0;
    $y =0;
    $z =0;
    if ($activity==0){$x =0;}else if ($activity==1){$x =10;}else if ($activity==2){$x =15;}else if ($activity==3){$x =35;}
    if ($Plats==0){$y =0;}else if ($Plats==1){$y =20;}else if ($Plats==2){$y =35;}else if ($Plats==3){$y =85;}else if ($Plats==4){$y =130;}
    if ($bed==0){$z =0;}else if ($bed==1){$z =20;}

    return $x+$y+$z;
} 


if (isset($_GET['id'])){
    $id = $_GET['id'];
    if (verif($connection, $checkout, $checkin, $id) == "success") {
        $sql = "SELECT * FROM reservation WHERE id='".$id."'";
        $query = mysqli_query($connection, $sql);
    
        if (mysqli_num_rows($query) > 0) {
            $disc =  (int) getpromocode ($connection , $discount );
            $bonis = calculbonis($activity, $Plats, $bed);
            $nbBetDay = strtotime($checkout) - strtotime($checkin);
            $nbBetDay = floor($nbBetDay / 86400);
            $row = mysqli_fetch_array($query);
            $idroom = $row['idroom'];
            $sql1 = "SELECT * FROM room WHERE id='".$idroom."'";
            $query1 = mysqli_query($connection, $sql1);
    
            if (mysqli_num_rows($query1) > 0) {
                $sousrow = mysqli_fetch_array($query1);
                $pric = (float) $sousrow['RoomPrice'];
                $price = ($pric + $bonis)  * $nbBetDay;
                
                $Update = "UPDATE `reservation` SET `checkin`='".$checkin."', `checkout`='".$checkout."', `codePromo`='".$disc."', `etatRes`='0', `Price-M`='".$price."', `bed_type`='".$bed."', `activity`='".$activity."', `Plats`='".$Plats."' WHERE id='".$id."'";
                $Update_q = mysqli_query($connection, $Update);
    
                echo 1;
            }
        }
    } else {
        echo verif($connection, $checkout, $checkin, $id);
    }
    

}

?>