<?php
require_once('concat_function.php');
$id = $_GET['id'];
if(!empty($id)){
$sql ="DELETE FROM `contact` WHERE `contact`.`id` = ".$id."";
$query=mysqli_query($connection, $sql)or die(msqli_error($query));
if($query == true ) {

    echo 1 ;
}else{

    echo 0;
    }
}else{

echo 0;     

}

?>