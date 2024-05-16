<?php
require_once('../../config/connect.php');

    $id = $_GET['id'] ;
    $sql = "SELECT * FROM contact WHERE id = ".$id."" ;
    $query = mysqli_query($connection ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query) ;
        $sql2 = 'SELECT * FROM client WHERE id = '.$row['mail_emateur'].'' ;
        $query2 = mysqli_query($connection ,$sql2) ;
        if(mysqli_num_rows($query2) > 0){
            $row2 = mysqli_fetch_array($query2) ;
            $ids = $row['id'] ;
            $image = $row2['photo'];
            $username = $row2['nom'];
            $title = $row['titre'];
            $content = $row['content'];
            echo $username.'+'.$image.'+'.$title.'+'.$content.'+'.$ids;

        }
        
   
    }

   $checksql = "UPDATE `contact` SET `msg_red`='1' WHERE id = '".$id."'" ;
   mysqli_query($connection ,$checksql) ;
 
   
/*

*/

?>