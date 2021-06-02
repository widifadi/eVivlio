<?php
    // This file is used for storing data coming from client to db
    require "../../database/database_functions.php";
    $conn = db_connection();

    // start sessionn to get userName
    session_start();
    
    if (isset($_SESSION['user'])) {
        $userName = $_SESSION['user'];

        // getting customer id
        $sql = "SELECT customer_id FROM user WHERE username = '$userName'";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $customer = $row['customer_id'];
                }
            } else {
                echo "Error in getting customer id!";
            }

        if(isset($_POST['book_id'])){
            $bid = $_POST['book_id'];
            $bqty = 1;

            $sql = "SELECT price FROM book WHERE book_id = '$bid'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $bprice = $row['price'];
                }
            } else {
                echo "Error in getting book price!";
            }

            // Check if the book id with customer id already exist in the cart
            $sql = "SELECT book_id FROM cart WHERE book_id = '$bid' AND customer_id = '$customer'";
            $result = $conn->query($sql);
            $num_bid = 0;
            if ($result) {
                while ($row = $result->fetch_assoc()):
                    $num_bid += 1;
                endwhile;
            } else {
                echo 'Error in checking book!';
            }

            // Inserting book to the cart
            $sql = "INSERT INTO cart (book_id,customer_id,quantity,total_price) VALUE ($bid,$customer,$bqty,$bprice)";
            if ($num_bid <= 0) {

                if ($conn->query($sql) === TRUE) {
                
                    // Bootsrap alert
                    echo'<div class="alert alert-success alert-dismissible mt-2">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Book added to your cart!</strong>
                        </div>';

                }

            } else {

                // Bootstrap alert
                echo'<div class="alert alert-danger alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Book already added to your cart!</strong>
                    </div>';

            }
        }
    } else {

        // Bootstrap alert
        echo'<div class="alert alert-danger alert-dismissible mt-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>You are a guest, please log-in!</strong>
            </div>';

    } 
?>
