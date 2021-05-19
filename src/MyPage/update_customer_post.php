<?php require_once("../../templates/header.php"); ?>
<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['pd_edit'])) {

        $user_name = $_SESSION['user'];

        $first_name = $_POST['first_name'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['last_name'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);

        $birthday = $_POST['birthday'];
        $birthday = mysqli_real_escape_string($conn, $birthday);

        $phone = $_POST['phone'];
        $phone = mysqli_real_escape_string($conn, $phone);

        $address = $_POST['address'];
        $address = mysqli_real_escape_string($conn, $address);

        $city = $_POST['city'];
        $city = mysqli_real_escape_string($conn, $city);

        $state = $_POST['state'];
        $state = mysqli_real_escape_string($conn, $state);

        $update_customer_query = "UPDATE customer INNER JOIN user 
                                    ON customer.customer_id=user.customer_id
                                    SET first_name = '$first_name', 
                                        last_name = '$last_name',
                                        email = '$email',
                                        birthday = '$birthday',
                                        phone = '$phone',
                                        address = ' $address',
                                        city = '$city',
                                        state = '$state'
                                       WHERE username='$user_name' ";

        

        if ($conn->query($update_customer_query) === TRUE) {
            echo "Customer updated successfully. <br>";
        } else {
            echo "Customer Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

      header("location: ../../public/my_page.php");
    }
      
    mysqli_close($conn);

?>