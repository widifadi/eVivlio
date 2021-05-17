<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    $order_id = $_GET['order_id'];

    $query_order = "SELECT * FROM customer_order WHERE order_id=$order_id;";
    $order_result = mysqli_query($conn, $query_order);

    if (mysqli_num_rows($order_result)) {
        $order_row = mysqli_fetch_assoc($order_result);

        $order_details = array('customer_id' => $order_row['customer_id'], 
                            'order_date' => $order_row['order_date'],
                            'shipping_status' => $order_row['shipping_status']);

        // echo result in JSON format
        echo json_encode($order_details);
    }
      
    mysqli_close($conn);

?>