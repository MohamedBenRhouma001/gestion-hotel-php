<?php
require_once('concat_function.php');
$title = $_POST['title'] ;
$content = $_POST['content'] ;
if(!empty($title) && !empty($content)){
    $sql = "INSERT INTO `contact` (`id`, `content`, `date_creation`, `mail_emateur`, `titre`, `msg_red`) VALUES (NULL, '".$content."', NOW(), '".$_SESSION['id']."', '".$title."', '0')";
    $query = mysqli_query($connection ,$sql) ;
    if($query == true){
        $result = 1 ;
    }
    else{
        $result = 2 ;
    }
}
else{
    $result = 2 ;
}
echo $result ;


?>