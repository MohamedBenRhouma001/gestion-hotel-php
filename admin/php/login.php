<?php
require_once('../../config/connect.php');
$email = $_GET['email'] ;
$password = $_GET['psw'] ;

if(!empty($email) && !empty($password)){

   $sql = "SELECT * FROM `admin` WHERE mail = '$email'";
   $query = mysqli_query($connection, $sql);

   if(mysqli_num_rows($query) > 0){
      $row = mysqli_fetch_array($query);
      $hashedPassword = $row['password'];
      
      if(password_verify($password, $hashedPassword)){
         $_SESSION['admin'] = $row['id'];
         $_SESSION['codeAdmin'] = $row['password'];
          echo 1 ;
      }else{
        echo 0 ;
     }
}
else{
    echo 0 ;
}}else{
   echo 0 ;
}
?>

