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

    // Get POST data from AJAX
    $customer_id = $_POST['customer_id'];
    $username = $_POST['username'];

    $delete_customer = "DELETE FROM customer WHERE customer_id='$customer_id'; "; 
    if (mysqli_query($conn, $delete_customer)) {
        echo "0";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
    }

    // delete user if it exists
    $delete_user = "DELETE FROM user WHERE username=$username; ";
    mysqli_query($conn, $delete_user);
    
    mysqli_close($conn);

?>