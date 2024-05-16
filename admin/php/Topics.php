<?php
require_once('../../config/connect.php');

if(isset($_SESSION['admin'])) {

  $sql1 = "SELECT * FROM `admin` WHERE `id`='" . $_SESSION['admin'] . "'";
  $query1 = mysqli_query($connection, $sql1);
   if(mysqli_num_rows($query1) > 0) {
    
    $row1 = mysqli_fetch_array($query1);
    if($_SESSION['codeAdmin'] == $row1['password']) {
      

$sql="SELECT * FROM `room`";
$query=mysqli_query($connection ,$sql);
if(mysqli_num_rows($query) > 0){
     while($row = mysqli_fetch_array($query)){
        echo'
        <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['title'].'</td>
        <td>
          <button class="btn btn-success" data-toggle="modal" data-target="#editRoomModal" onclick="StartupdateTopic('.$row['id'].')" >Modifier</button>
          <button class="btn btn-danger" onclick="DeleteTopic('.$row['id'].')">Supprimer</button>
        </td>
      </tr>
       ';
     }

}

}
}
}
?>