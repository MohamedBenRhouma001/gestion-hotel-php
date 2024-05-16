<?php
require_once('../../config/connect.php');
$id = $_GET['id'] ;
$reply = $_GET['reply'] ;

$sql = "SELECT * FROM contact WHERE id = ".$id."" ;
    $query = mysqli_query($connection ,$sql) ;
        $row = mysqli_fetch_array($query) ;
        $title = $row['titre'];
        $mail_emateur = $row['mail_emateur'];

$sql = "INSERT INTO `contact`(`titre`,`content`, `mail_emateur`, `req_id`) VALUES ('".$title."','".$reply."', '0','".$mail_emateur."')";
$query = mysqli_query($connection , $sql) ;
if($query == true){
    echo 1 ;
}else{
    echo 2 ;
}


?>