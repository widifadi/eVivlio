<?php 
    // TODO do sql connection only once for the whole app
    // TODO use database_functions file
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eVivlio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $conn = mysqli_connect($servername, $username, $password,'www_project') or die("Couldn't connect to database");

    if (isset($_POST['register_btn'])) {
        $first_name     =   $_POST['firstName'];
        $last_name      =   $_POST['lastName'];
        $email          =   $_POST['email'];
        $username       =   $_POST['username'];
        $password       =   $_POST['password'];
        $password_check =   $_POST['confirmPassword'];
        $birthdate      =   $_POST['birthdate'];
        $phone          =   $_POST['phone'];
        $street_address =   $_POST['stAddress'];
        $city           =   $_POST['city'];
        $state          =   $_POST['state'];

        $first_name = mysqli_real_escape_string($conn, $first_name);
        $last_name = mysqli_real_escape_string($conn, $last_name);
        $email = mysqli_real_escape_string($conn, $email);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $hash_password = md5($password); 
        $password_check = mysqli_real_escape_string($conn, $password_check);
        $birthdate = mysqli_real_escape_string($conn, $birthdate);
        $phone = mysqli_real_escape_string($conn, $phone);
        $street_address = mysqli_real_escape_string($conn, $street_address);
        $city = mysqli_real_escape_string($conn, $city);
        $state = mysqli_real_escape_string($conn, $state);

        if ($password != $password_check) {
            echo 'Passwords do not match !';
        }

        // TODO username has to be unique
        // TODO error on insert fail
        $customer_query = "INSERT INTO customer (first_name, last_name, email, username, birthdate, phone, street_address, city, state) 
                        VALUES ('$first_name', '$last_name', '$email', '$username', '$birthdate', '$phone', '$street_address', '$city', '$state')";
        if ($conn->query($customer_query) === TRUE) {
            echo "New customer created successfully. <br>" . $first_name;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $user_query = "INSERT INTO user (username, password) 
                    VALUES ('$username', '$password')";
        if ($conn->query($user_query) === TRUE) {
            echo "New user created successfully. <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $_SESSION['success'] = "Congratulations! You have successfully registered.";
        // header("location: index.php");
    } 
?>
