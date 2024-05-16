<?php
require_once('concat_function.php') ;
require_once('header.php');

if(isset($_GET['mode'])){
    $mode = $_GET['mode'] ;
}else{
    $mode = false ;
}
if($mode == false || $mode == 'msg'){
    require_once('msgForm.php');
}
require_once('footer.php') ;


?>