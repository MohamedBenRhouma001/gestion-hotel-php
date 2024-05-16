<?php
require_once("concat_function.php");
$id = $_GET['id'] ;
$tag = $_GET['tag'] ;
$sql = "SELECT * FROM contact WHERE id = '".$id."'";
$query = mysqli_query($connection ,$sql);
$bring = mysqli_fetch_array($query) ;
$sql_user = "SELECT * FROM client WHERE id='".$bring['mail_emateur']."'" ;
$query_user =mysqli_query($connection ,$sql_user) ;
$bring_user_info = mysqli_fetch_array($query_user) ;




$msgtitle = $bring['titre'] ;
$msgsender = $bring_user_info['nom'];
$message = $bring['content'];
$msgtime = $bring['date_creation'];

        $formattedDate = date('Y F j', strtotime($msgtime));

$userimage = $bring_user_info['photo'];

switch($tag){
    case "title":
        echo "$msgtitle" ;
        break ;
    case "message":
        echo "$message" ;
        break ;
    case "image":
        echo "$userimage" ;
        break;
    case "sender":
        echo "$msgsender" ;
        break ;
    case "date":
            echo "$formattedDate" ;
            break ;
        default :
        echo "error" ;
}



?>