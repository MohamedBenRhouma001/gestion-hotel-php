<?php

require_once('config/connect.php') ;

///
if(isset($_GET['index'])){
    $index = $_GET['index'] ;
}
else{
    $index = 'home' ;
}
///
require_once('head.php') ;
if($index == 'home'){
require_once('header.php') ;
require_once('topicsHeader.php') ;
if(!isset($_SESSION['id'])){
showAllTopics($connection) ;}
require_once('footer.php') ;
}

///// TOPIC
if($index == 'topic'){
if(isset($_GET['ID'])){
$TopicID = $_GET['ID'] ;
}else{
    $TopicID = False ;
}
if($TopicID !== False){
require_once('config/topic_Function.php');
topic_Header('Plaza');  // to change site name edit (Plaza)
GetTopic($connection ,$TopicID) ;
}else {
    echo '404' ;
}
}



?>