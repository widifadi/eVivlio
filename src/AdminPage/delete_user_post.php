<?php

    include("../../database/database_functions.php");
    $conn = db_connection();

    // Get POST data from AJAX
    $user_id = $_POST['user_id'];
    $customer_id = $_POST['customer_id'];

    $delete_user = "DELETE FROM user WHERE user_id=$user_id; ";
    if (mysqli_query($conn, $delete_user)) {
        echo "user 0";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
        exit;
    }

    // delete from all tables with relations to customer
    $delete_cart = "DELETE FROM cart WHERE customer_id=$customer_id;";
    $delete_book_review = "DELETE FROM book_review WHERE customer_id=$customer_id;";
    $delete_customer_order = "DELETE FROM customer_order WHERE customer_id=$customer_id;";
    $delete_payment = "DELETE FROM payment WHERE customer_id=$customer_id;";
    $delete_wishlist = "DELETE FROM wishlist WHERE customer_id=$customer_id;";

    mysqli_query($conn, $delete_cart);
    mysqli_query($conn, $delete_book_review);
    mysqli_query($conn, $delete_customer_order);
    mysqli_query($conn, $delete_payment);
    mysqli_query($conn, $delete_wishlist);

    $delete_customer = "DELETE FROM customer WHERE customer_id=$customer_id; "; 
    if (mysqli_query($conn, $delete_customer)) {
        echo "customer 0 ";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
        echo $delete_customer;
        exit;
    }

    mysqli_close($conn);

?>