<?php
    // This file is used for storing data coming from client to db
    require "../../database/database_functions.php";
    $conn = db_connection();

    // start sessionn to get userName
    session_start();
    
    if (isset($_SESSION['user'])) {
        $userName = $_SESSION['user'];

        // getting customer id
        $sql = "SELECT customer_id FROM user WHERE username='$userName'; ";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $customer_id = $row['customer_id'];
                }
            } else {
                echo "Error in getting customer id!";
            }

        if(isset($_POST['book_id'])){
            $book_id = $_POST['book_id'];

            // query book price 
            $book_query = "SELECT price FROM book WHERE book_id=$book_id";
            $book_query_result = mysqli_query($conn, $book_query);
            $book_row = mysqli_fetch_array($book_query_result);
            $book_price = $book_row['price'];

            // Check if the book id with customer id already exist in the cart
            $customer_cart_query = "SELECT * FROM cart 
                        WHERE book_id=$book_id AND customer_id=$customer_id;";
            $cart_result = mysqli_query($conn, $customer_cart_query); 
            $cart_row = mysqli_fetch_assoc($cart_result);

            if(mysqli_num_rows($cart_result) != 0) {
                // if book exists, increment quantity
                $new_quantity = $cart_row['quantity'] + 1 ;
                $increment_book_qty_query = "UPDATE cart SET quantity = $new_quantity 
                                    WHERE book_id=$book_id AND customer_id=$customer_id;";

                if ($conn->query($increment_book_qty_query) === TRUE) {
                    echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Cart updated.</strong>
                            </div>';
                } else {
                    echo "Cart Table Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            } else {
                // insert book to cart
                $total_price = $cart_row['quantity'] * $book_price;
                $insert_book_query = "INSERT INTO cart (book_id,quantity,customer_id, total_price) 
                    VALUE ($book_id, 1, $customer_id, $total_price)";
                    if ($conn->query($insert_book_query) === TRUE) {
                        // Bootsrap alert
                        echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Book added to your cart!</strong>
                            </div>';
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    exit();
                }
            }
        }
    } else {

        // If the user not logged in
            
       // Initialize variable if not yet set
        if (!isset($_SESSION['guest_cart'])) {
            $_SESSION['guest_cart'] = array();
        }

         // Storing book id in session guest_cart
        if (isset($_POST['book_id'])) {
            // if book_id already exists
            if (isset($_SESSION['guest_cart'][$_POST['book_id']])) {
                // increment book quantity
                $_SESSION['guest_cart'][$_POST['book_id']]++;

                // Bootstrap alert
                echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                        Book already added to cart. Please register or login to proceed with purchase.
                    </div>';
            } else {
                // add new book 
                $_SESSION['guest_cart'][$_POST['book_id']] = 1;

                // Bootstrap alert
                echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                        Book added to cart. Please register or login to proceed with purchase.
                    </div>';
            }
        }
        
    }     
?>