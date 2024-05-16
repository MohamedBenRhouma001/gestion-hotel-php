<?php
require_once('../../config/connect.php');

if(isset($_SESSION['admin'])) {
  
  $sql2 = "SELECT * FROM `admin` WHERE `id`='" . $_SESSION['admin'] . "'";
  $query2 = mysqli_query($connection, $sql2);
   if(mysqli_num_rows($query2) > 0) {
    
    $row2 = mysqli_fetch_array($query2);
    if($_SESSION['codeAdmin'] == $row2['password']) {
     


$sql="SELECT * FROM `contact`";
$query=mysqli_query($connection ,$sql);
if(mysqli_num_rows($query) > 0){
     while($row = mysqli_fetch_array($query)){
      if($row['mail_emateur'] > 0){
        echo'<tr ' ;
         if($row['msg_red'] == 0){
        echo 'id="msgfcolor"' ;
         }
        echo '>
        <td>'.$row['id'].'</td>
        <td  style="cursor: pointer;" onclick="checkmsg('.$row['id'].')">'.$row['titre'].'</td>
        <td>
          <button class="btn btn-danger" onclick="Deletemsg('.$row['id'].')">Supprimer</button>
        </td>
      </tr>
       ';
      }
     }

}


}
}
}
