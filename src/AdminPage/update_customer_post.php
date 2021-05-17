<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['update-customer-btn'])) {
        $customer_id = $_POST['customer-id'];
        $customer_id = mysqli_real_escape_string($conn, $customer_id);

        $first_name = $_POST['firstName'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['lastName'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);

        $birthdate = $_POST['birthdate'];
        $birthdate = mysqli_real_escape_string($conn, $birthdate);

        $phone = $_POST['phone'];
        $phone = mysqli_real_escape_string($conn, $phone);

        $street_address = $_POST['stAddress'];
        $street_address = mysqli_real_escape_string($conn, $street_address);

        $city = $_POST['city'];
        $city = mysqli_real_escape_string($conn, $city);

        $state = $_POST['state'];
        $state = mysqli_real_escape_string($conn, $state);

        $update_customer_query = "UPDATE customer 
                                    SET first_name = '$first_name', 
                                        last_name = '$last_name',
                                        email = '$email',
                                        birthday = '$birthdate',
                                        phone = $phone,
                                        address = '$street_address',
                                        city = '$city',
                                        state = '$state'
                                    WHERE customer_id = $customer_id ";

        echo $update_customer_query;

        if ($conn->query($update_customer_query) === TRUE) {
            echo "Customer updated successfully. <br>";
        } else {
            echo "Customer Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
        header("location: ../../public/admin_page.php#managecustomers");
    }
      
    mysqli_close($conn);

?>