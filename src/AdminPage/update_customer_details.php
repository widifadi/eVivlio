<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    $customer_id = $_POST['customer_id'];

    $query_customer = "SELECT * FROM customer WHERE customer_id=$customer_id;";
    $customer_result = mysqli_query($conn, $query_customer);

    if (mysqli_num_rows($customer_result)) {
        $customer_row = mysqli_fetch_assoc($customer_result);

        $customer_details = array('first_name' => $customer_row['first_name'], 
                            'last_name' => $customer_row['last_name'],
                            'email' => $customer_row['email'],
                            'birthday' => $customer_row['birthday'],
                            'phone' => $customer_row['phone'],
                            'address' => $customer_row['address'],
                            'city' => $customer_row['city'],
                            'state' => $customer_row['state']);

        // echo result in JSON format
        echo json_encode($customer_details);

    }
      
    mysqli_close($conn);

?>