<?php
require_once('config/connect.php') ;
   $id = $_GET['id'] ;
   $sql = "SELECT * FROM `room` WHERE `id` = '".$id."'" ;
   $query = mysqli_query($connection ,$sql) ;


   /////
$sql_res = "SELECT * from  reservation WHERE etatRes = '1' AND idroom='".$id."'" ;
$query_res = mysqli_query($connection ,$sql_res) ;
$reserverd_num = 0 ;
if(mysqli_num_rows($query_res) > 0){
    while($rows = mysqli_fetch_array($query_res)){
      $reserverd_num = $reserverd_num + $rows['nbrRoom'] ;
    }
}



   //
   if(mysqli_num_rows($query) >0){
       $row = mysqli_fetch_array($query);
       $number = $row['NumRooms'] ;
       $final_result = $number - $reserverd_num ;
       echo'<select class="select-par-com-tp-in" >' ;
       for($i = 1 ; $i <= $final_result ;$i++){
         if($i == 1){
            echo'<option selected value="'.$i.'">'.$i.'</option>' ;
         }else{
           echo'<option value="'.$i.'">'.$i.'</option>' ;
         }
       }
       echo'</select>';
   }
   


?>