<?php 

    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['save-customer-shipping-btn'])) {

        $user_name = $_SESSION['user'];

        $first_name = $_POST['firstName'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['lastName'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);

        $phone = $_POST['phone'];
        $phone = mysqli_real_escape_string($conn, $phone);

        $address = $_POST['shipAddress'];
        $address = mysqli_real_escape_string($conn, $address);

        session_start();
        $_SESSION['shipping_address']=$address;



        $update_customer_query = "UPDATE customer INNER JOIN user 
                                    ON customer.customer_id=user.customer_id
                                    SET first_name = '$first_name', 
                                        last_name = '$last_name',
                                        email = '$email',                  
                                        phone = '$phone',
                                       WHERE username='$user_name' ";       

        if ($conn->query($update_customer_query) === TRUE) {
            echo "Customer updated successfully. <br>";
        } else {
            echo "Customer Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

      header("location: ../../public/payment_process.php");
    }
      
    mysqli_close($conn);

?>