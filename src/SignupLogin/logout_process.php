<?php 
    session_start();
    $_SESSION = array();

    header('location: ../../public/logout.php');
    exit;
?>