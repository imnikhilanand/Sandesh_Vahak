<?php
session_start();
$_SESSION["user_id_multi"]=null;
$_SESSION["department"]=null;
session_unset();
session_destroy(); 
header('Location: index.php');
exit;
?>