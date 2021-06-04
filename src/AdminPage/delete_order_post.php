<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    $order_id = $_POST['order_id'];

    $delete_order_items = "DELETE FROM order_items WHERE book_id=$book_id;";
    mysqli_query($conn, $delete_order_items);

    $delete_order = "DELETE FROM customer_order WHERE order_id=$order_id; "; 
    if (mysqli_query($conn, $delete_order)) {
        echo "0";
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
        exit;
    }
    
    mysqli_close($conn);

?>