<?php 
    session_destroy();
    // unset($_SESSION['user']);
    $_SESSION = [];
    header('location: logout.php');
    exit();
?>