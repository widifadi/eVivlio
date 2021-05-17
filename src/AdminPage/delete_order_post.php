<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    $order_id = $_POST['order_id'];

    $delete_order = "DELETE FROM customer_order WHERE order_id=$order_id; "; 
    if (mysqli_query($conn, $delete_order)) {
        echo "0";
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
        exit;
    }
    
    mysqli_close($conn);

?>