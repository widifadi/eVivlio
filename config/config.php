<?php
    /*
        Creating constants for heavily used paths makes things a lot easier.
        ex. require_once(LIBRARY_PATH . "Paginator.php")
    */
    defined("TEMPLATES_PATH") 
        || define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '../templates'));

?>