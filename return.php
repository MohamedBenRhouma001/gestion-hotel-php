<?php 

require_once('config/connect.php');

$id = $_GET['id'];
    $Update = "UPDATE `reservation` SET `checkout`='0000-00-00',`codePromo`='0',`adult`='0',`child`='0',`nbrRoom`='1',`etatRes`='0',`Price-M`='0',`bed_type`='0',`all`='1',`activity`='0',`Plats`='0' WHERE id='".$id."'";
            $Update_q = mysqli_query($connection ,$Update) or die("ererererere") ;
            if ($Update_q == true ){
                echo 1 ;
            }else{echo 0 ;}


?>
