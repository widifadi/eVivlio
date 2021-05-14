<?php 
    // TODO do sql connection only once for the whole app
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

        
      
    mysqli_close($conn);

?>