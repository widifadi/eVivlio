<?php  
    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['register_btn'])) {
        $first_name = $_POST['firstName'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['lastName'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);

        $username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $username);

        $password = $_POST['password'];
        $password = mysqli_real_escape_string($conn, $password);
        $hash_password = md5($password); 

        $password_check = $_POST['confirmPassword'];
        $password_check = mysqli_real_escape_string($conn, $password_check);

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

        if ($password != $password_check) {
            echo 'Passwords do not match!';
        }

        $customer_query = "INSERT INTO customer (first_name, last_name, email, birthday, phone, address, city, state) 
                        VALUES ('$first_name', '$last_name', '$email', '$birthdate', '$phone', '$street_address', '$city', '$state')";
        if ($conn->query($customer_query) === TRUE) {
            echo "New customer created successfully. <br>" . $first_name;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $customer_id = mysqli_insert_id($conn);

        $user_query = "INSERT INTO user (customer_id, username, password) 
                    VALUES ('$customer_id', '$username', '$hash_password')";
        if ($conn->query($user_query) === TRUE) {
            echo "New user created successfully. <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("location: ../../public/successful_registration.php");
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>