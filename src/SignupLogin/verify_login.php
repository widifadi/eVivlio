<?php

    require_once("../../database/database_functions.php");
    $conn = db_connection();
    
    if (isset($_POST['login_btn'])) {
        $username       =   $_POST['username'];
        $password       =   $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $hash_password = md5($password); 

        $password_query = "SELECT * FROM user 
                            WHERE username = '$username' AND password = '$hash_password' ";
        $result = mysqli_query($conn, $password_query);

        if (mysqli_num_rows($result)) {
            echo "Login successful.";

            session_start();
            // Save user session
            $_SESSION['user'] = $username;

            // get the permission
            $user_row = mysqli_fetch_array($result);
            $admin_permission = $user_row['admin_permission'];
            $_SESSION['admin_permission'] = $admin_permission;

            // If guest_cart session has some contents, carry the books over to customer's cart in the db
            $customer_id = $user_row['customer_id'];
   
            // If $_SESSION['guest_cart'] isset, insert book to cart under customer
            if (isset($_SESSION['guest_cart']) && $admin_permission != 1) {
                foreach ($_SESSION['guest_cart'] as $book_item_id => $guest_book_qty) {

                    // query book price 
                    $book_query = "SELECT price FROM book WHERE book_id=$book_item_id";
                    $book_query_result = mysqli_query($conn, $book_query);
                    $book_row = mysqli_fetch_array($book_query_result);
                    $book_price = $book_row['price'];
                    $total_price = $book_price * $guest_book_qty;

                    // insert book into cart
                    $insert_book_query = "INSERT INTO cart (book_id,quantity,customer_id, total_price) 
                                VALUE ($book_item_id, $guest_book_qty, $customer_id, $total_price)";
                    if ($conn->query($insert_book_query) === TRUE) {
                        echo "Book inserted to cart. <br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        exit();
                    }
                echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                    Your Cart is updated.
                </div>';        
                }
            }

        header("location: ../../public/index.php");
        exit();

    } else {
        header('location:../../public/signup_login.php#pills-login');
            
        // TODO pass login error to login page
        }
    }


    if (isset($conn)) {
        mysqli_close($conn);
    }

?>
