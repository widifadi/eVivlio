<?php
    /*
        Creating constants for heavily used paths makes things a lot easier.
        ex. require_once(LIBRARY_PATH . "Paginator.php")
    */
    defined("TEMPLATES_PATH") 
        || define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '../templates'));

    // Database config
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eVivlio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>