<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    // Get POST data from AJAX
    $customer_id = $_POST['customer_id'];

    $delete_customer = "DELETE FROM customer WHERE customer_id=$customer_id; "; 
    if (mysqli_query($conn, $delete_customer)) {
        echo "0";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
        exit;
    }

    // delete user if it exists
    $delete_user = "DELETE FROM user WHERE customer_id=$customer_id; ";
    mysqli_query($conn, $delete_user);
    
    mysqli_close($conn);

?>