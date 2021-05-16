<?php

    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['update-order-btn'])) {
        $order_id = $_POST['order_id'];
        $shipping_status = $_POST['shipping_status'];

        $update_order_query = "UPDATE customer_order 
                        SET shipping_status = '$shipping_status'
                        WHERE order_id = '$order_id' ";

        if ($conn->query($update_order_query) === TRUE) {
            echo "Order updated successfully. <br>";
        } else {
            echo "Order Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

        header("location: ../../public/admin_page.php#manageorders");
    }
      
    mysqli_close($conn);

?>