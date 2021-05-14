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
    $user_id = $_POST['user_id'];
    $username = $_POST['user_name'];

    $delete_customer = "DELETE FROM customer WHERE username='$username'; "; 
    if (mysqli_query($conn, $delete_customer)) {
        echo "customer 0 ";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
    }

    $delete_user = "DELETE FROM user WHERE user_id=$user_id; ";
    if (mysqli_query($conn, $delete_user)) {
        echo "user 0";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
      
    mysqli_close($conn);

?>