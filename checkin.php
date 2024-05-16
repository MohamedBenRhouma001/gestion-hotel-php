<?php


require_once('config/connect.php');
$adult = $_GET['adult'] ;
$child = $_GET['child'] ;
$checkin = $_GET['checkin'] ;
$checkout = $_GET['checkout'] ;
$topicID = $_GET['id'] ;
$rooms = $_GET['rooms'] ;
$id = $_SESSION['id'] ;
$bedtype = $_GET['bedtype'] ;
$PromoEtat = $_GET['PromoEtat'] ;
$Plats = $_GET['Plats'] ;
$activity = $_GET['activity'] ;



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
    
    function calculbonis($activity ,$Plats ,$bed){
        $x =0;
        $y =0;
        $z =0;
        if ($activity==0){$x =0;}else if ($activity==1){$x =10;}else if ($activity==2){$x =15;}else if ($activity==3){$x =35;}
        if ($Plats==0){$y =0;}else if ($Plats==1){$y =20;}else if ($Plats==2){$y =35;}else if ($Plats==3){$y =85;}else if ($Plats==4){$y =130;}
        if ($bed==0){$z =0;}else if ($bed==1){$z =20;}
    
        return $x+$y+$z;
    } 
    
    
    function getpromocode ($connection ,$code) {
    
    
        if(!empty($code)){
            $sql = "SELECT * FROM promo WHERE code_promo = '".$code."'AND durer > NOW()" ;
            $query = mysqli_query($connection, $sql) ;
            if(mysqli_num_rows($query) > 0){
                $promo = mysqli_fetch_array($query) ;
                $discount = $promo['prix_promo'] ;
                return  $discount ;
            }
            else{
                return 0 ;
            }
        }
    
    
    }






if( !empty($checkin) || !empty($checkout)){
if ((verifnbrtotal($connection ,$topicID) - verifnbrutil($connection, $checkin, $checkout, $topicID)) >=$rooms ) {
   
    $bonis=calculbonis($activity ,$Plats ,$bedtype);
    $nbBetDay = strtotime($checkout) - strtotime($checkin);
    $nbBetDay = floor($nbBetDay / 86400); // Convertir en jours et arrondir à l'entier inférieur
    $disc = (int)  getpromocode ($connection , $PromoEtat );
    $sql1  = "SELECT *  FROM  room WHERE id='".$topicID."' ";
    $query1 = mysqli_query($connection, $sql1) ;
    if(mysqli_num_rows($query1) > 0){
    $sousrow = mysqli_fetch_array($query1);
    $pric = (float) $sousrow['RoomPrice'];
    $price = ($pric + $bonis)  * $nbBetDay ;

    $sql = "INSERT INTO `reservation`(`checkin`, `checkout`, `adult`, `child`, `idclient`, `idroom`, `etatRes`,`nbrRoom`,`Price-M`,`bed_type`,`codePromo`,`Plats`,`activity`) VALUES ('".$checkin."','".$checkout."','".$adult."','".$child."','".$id."','".$topicID."','0','".$rooms."', '".$price."','".$bedtype."','".$disc."','".$Plats."','".$activity."')" ;
    $query = mysqli_query($connection, $sql) ;
    if($query == true){
        echo 1 ;
    }else{
        echo 0 ;
    }
}
    }else{
        echo 3 ;
    }

}else{echo 4;}

?>
