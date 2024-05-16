<?php
require_once('../../config/connect.php');
if(isset($_SESSION['admin'])){
 
 
   if(isset($_COOKIE['etat'])) {
           echo 2;
        }

        if (!isset($_COOKIE['etat']) && !isset($_SESSION['room'])) {
          echo 1;
      }
      
      if(isset($_SESSION['room']) && !isset($_COOKIE['etat'])) {
        unset($_SESSION['room']);
        echo 3;
      } 
  

    }else{
    echo 0 ;
}


?>