<?php
require_once('config/connect.php');

session_destroy();

header('Location: index.php');


?>