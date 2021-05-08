<?php 
    session_destroy();
    // unset($_SESSION['user']);
    $_SESSION = [];
    header('location: index.php');
    exit();
?>