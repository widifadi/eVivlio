<?php

    include("../../database/database_functions.php");
    $conn = db_connection();

    // Get POST data from AJAX
    $user_id = $_POST['user_id'];
    $customer_id = $_POST['customer_id'];
    echo $username;

    $delete_customer = "DELETE FROM customer WHERE customer_id=$customer_id; "; 
    if (mysqli_query($conn, $delete_customer)) {
        echo "customer 0 ";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
        echo $delete_customer;
        exit;
    }

    $delete_user = "DELETE FROM user WHERE user_id=$user_id; ";
    if (mysqli_query($conn, $delete_user)) {
        echo "user 0";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
        exit;
    }

    mysqli_close($conn);

?>