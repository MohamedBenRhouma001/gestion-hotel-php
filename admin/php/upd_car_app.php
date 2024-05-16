<?php
require_once('../../config/connect.php');

if(isset($_SESSION['admin'])) {
    echo 0;
    $sql1 = "SELECT * FROM `admin` WHERE `id`='" . $_SESSION['admin'] . "'";
    $query1 = mysqli_query($connection, $sql1);
     if(mysqli_num_rows($query1) > 0) {
      
      $row1 = mysqli_fetch_array($query1);
      if($_SESSION['codeAdmin'] == $row1['password']) {
        

$code= $_GET['code'] ;
$duration = $_GET['duration'] ;
$price = $_GET['price'] ;
$sql = "INSERT INTO `promo`(`code_promo`, `prix_promo`, `durer`) VALUES ('".$code."','".$price."','".$duration."')";
$query =mysqli_query($connection , $sql); 

if ($query == true ){
    echo 1;
}else
{
    echo 0;
}

}
}
}

?>