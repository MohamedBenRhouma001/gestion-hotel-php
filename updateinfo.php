<?php
require_once('config/connect.php') ;
if(isset($_GET['mode'])){
    $mode = $_GET['mode'] ;
   if($mode == "userinf"){
         $table = $_GET['table'] ;
         $value = $_GET['value'];
         $sql = "SELECT * FROM client WHERE id ='".$value."'" ;
         $query = mysqli_query($connection ,$sql) or die('error');
         if(mysqli_num_rows($query) > 0){
              $row = mysqli_fetch_array($query) ;
              $q = $row[$table] ;

              echo $q ;
         }
         else{
            echo 'Unknown' ;
         }
   }
   elseif($mode == "updateinf") {
    $table = $_GET['table'];
    $value = $_GET['value'];
    
    if ($table == "password") {
        $value1 = $value;
        $value = password_hash($value1, PASSWORD_DEFAULT);
    }
    
    $id = $_GET['id'];
    
    if ($table == "mail") {
        $sql = "SELECT * FROM client WHERE mail = '" . $value . "'";
        $query = mysqli_query($connection, $sql) or die('error');
        $row = mysqli_fetch_array($query);
        if (mysqli_num_rows($query) < 0 || (mysqli_num_rows($query) == 1 && $row['id'] == $id)) {
            $sql10 = "UPDATE `client` SET `".$table."`='".$value."' WHERE `id`= ".$id."" ;
            $query10 = mysqli_query($connection ,$sql10) ;
            
            if($query10){
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 10;
        }
    } else {
        $sql = "UPDATE `client` SET `".$table."`='".$value."' WHERE `id`= ".$id."" ;
        $query = mysqli_query($connection ,$sql) ;
        
        if($query){
            echo 1;
        } else {
            echo 0;
        }
    }
}

   elseif($mode = "reservation"){
     $iduser = $_SESSION['id'] ;
     $idtopic = $_GET['id'] ;

     $sql = "SELECT * FROM reservation WHERE idclient = '".$iduser."' AND idroom = '".$idtopic."' AND etatRes ='0'" ;
     $query = mysqli_query($connection ,$sql) ;
     $num = mysqli_num_rows($query) ;
     if( $num > 0){
         echo 1 ;
     }
     else {
        echo 0 ;
     }
   }

}


?>