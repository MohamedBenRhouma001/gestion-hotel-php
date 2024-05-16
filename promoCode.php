<?php
require_once('config/connect.php') ;
$code = $_GET['code'] ;
if(!empty($code)){
    $sql = "SELECT * FROM promo WHERE code_promo = '".$code."'AND durer > NOW()" ;
    $query = mysqli_query($connection, $sql) ;
    if(mysqli_num_rows($query) > 0){
        $promo = mysqli_fetch_array($query) ;
        $discount = $promo['prix_promo'] ;
        echo $discount ;
    }
    else{
        echo 0 ;
    }
}

?>