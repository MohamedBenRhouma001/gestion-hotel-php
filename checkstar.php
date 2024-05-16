<?php
require_once('config/connect.php');
if(isset($_GET['mode'])){
$id = $_GET['id'] ;
function bringstars($con ,$idtopic){
    $sql ="SELECT * FROM stars WHERE idtopic = '".$idtopic."' AND idclient='".$_SESSION['id']."'" ;
    $query = mysqli_query($con ,$sql)or die('error4') ;
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query) ;
        $stars = $row['stars'] ;
        return $stars ;
    }
}
echo bringstars($connection ,$id) ;
}else{
$id = $_GET['id'] ;
$stars = $_GET['stars'] ;
echo 'id : '.$id.' and starts :'.$stars ;
function Checkin ($con ,$idtopic){
      $sql = "SELECT * FROM stars WHERE idtopic = '".$idtopic."' AND idclient='".$_SESSION['id']."'" ;
      $query = mysqli_query($con ,$sql)  or die('error1');
      if(mysqli_num_rows($query) > 0){
               return 1 ;
      }
      else{
        return 0 ;
      }
}

function insert($con ,$id ,$stars){
   $sql = "INSERT INTO `stars`(`idtopic`, `idclient`, `stars`) VALUES ('".$id."','".$_SESSION['id']."','".$stars."')" ;
   $query = mysqli_query($con ,$sql) or die('error2') ;
   if($query == true){
     return 1 ;
   }
   else{
    return 0 ;
   }
}
function update($con ,$id ,$stars){
    $sql = "UPDATE `stars` SET `stars`='".$stars."' WHERE `idtopic`='".$id."' AND `idclient`='".$_SESSION['id']."'" ;
    $query = mysqli_query($con ,$sql) or die('error3') ;
   if($query == true){
     return 1 ;
   }else
   {
     return 0 ;
   }
}

if(Checkin ($connection ,$id) == 0){
    insert($connection ,$id ,$stars) ;
}else{
    
    update($connection ,$id ,$stars) ;
}

}


?>