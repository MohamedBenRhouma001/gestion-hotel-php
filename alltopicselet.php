<?php
require_once('config/connect.php') ;
/*ken betbadel fi formulaire matensech etzidha nbr room = 0*/
function verif($con ){
    $sql = "SELECT * FROM `reservation` WHERE `idclient`='".$_SESSION['id']."' AND `checkout`='0' AND etatRes ='0'" ;
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        return true ;
    }else{
        return false ;
    }
}


if (verif($connection )){
        echo 1;
       }else{
        echo 0;
       }
    


?>