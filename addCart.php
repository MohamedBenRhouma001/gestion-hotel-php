<?php
require_once('config/connect.php') ;
/*ken betbadel fi formulaire matensech etzidha nbr room = 0*/

function verif1($con ,$id){
    $sql = "SELECT * FROM `reservation` WHERE `idclient`='".$_SESSION['id']."' AND `idroom`='".$id."' AND `etatRes` ='0'  AND `Price-M` >='1'" ;
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        return false ;
    }else{
        return true ;
    }
}

function verif2($con ,$id){
    $sql = "SELECT * FROM `reservation` WHERE `idclient`='".$_SESSION['id']."' AND `idroom`='".$id."' AND `etatRes` ='0'  AND `Price-M` ='0'" ;
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        return false ;
    }else{
        return true ;
    }
}


function insert($comm ,$idRoom){
    $sql ="INSERT INTO `reservation`(`idclient`, `idroom`, `etatRes`,`all`,`nbrRoom`) VALUES ('".$_SESSION['id']."','".$idRoom."','0','1','1')";
    $query = mysqli_query($comm ,$sql) ;
    if($query==true){
        return 1;
    }else{
        return 0;
    }
}

function delete($comm ,$idRoom){
    $sqldelet ="DELETE FROM `reservation` WHERE `idclient`='".$_SESSION['id']."' AND `idroom`='".$idRoom."' AND `etatRes` ='0'  AND `Price-M` ='0'" ;
    $querydelet = mysqli_query($comm ,$sqldelet) ;
    if($querydelet==true){
        return 1;
    }else{
        return 0;
    }
}


$id=$_GET['id'];
if (isset($_SESSION['id'])){
if (verif1($connection ,$id)){
    if (verif2($connection ,$id)){
        if (insert($connection ,$id)==1){
          echo 1;
       }else{
          echo 2;
       }}else {
        if (delete($connection ,$id)==1){
          echo 1;
        }else{
          echo 2;}
        
       }
    
    }else{
        echo 0;
    }
}else{
    echo 2;
}






