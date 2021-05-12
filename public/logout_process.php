<?php 
    session_start();
    $_SESSION = array();

    header('location: logout.php');
    exit;
?>