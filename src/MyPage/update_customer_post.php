<?php require_once("../templates/header.php"); ?>
<?php 
    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['pd_edit'])) {
        
        $first_name = $_POST['first_name'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['last_name'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);


        /*$phone = $_POST['phone'];
        $phone = mysqli_real_escape_string($conn, $phone);

        $street_address = $_POST['stAddress'];
        $street_address = mysqli_real_escape_string($conn, $street_address);

        $city = $_POST['city'];
        $city = mysqli_real_escape_string($conn, $city);

        $state = $_POST['state'];
        $state = mysqli_real_escape_string($conn, $state);*/
        
        $user_name = $_SESSION['user'];

        $update_customer_query = "UPDATE customer 
                                INNER JOIN user 
                                ON customer.customer_id=user.customer_id  
                                    SET first_name = '$first_name', 
                                        last_name = '$last_name',
                                        email = '$email',
                                       
                                        phone = $phone,
                                      
                                        WHERE username='$user_name';

        echo $update_customer_query;

        if ($conn->query($update_customer_query) === TRUE) {
            echo "Customer updated successfully. <br>";
        } else {
            echo "Customer Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

        header("location: ../../public/mypage.php#preview");
    }
      
    mysqli_close($conn);

?>