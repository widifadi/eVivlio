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

            // Check if the book id with customer id already exist in the cart
            $sql = "SELECT book_id FROM wishlist WHERE book_id = '$bid' AND customer_id = '$customer'";
            $result = $conn->query($sql);
            $num_bid = 0;
            if ($result) {
                while ($row = $result->fetch_assoc()):
                    $num_bid += 1;
                endwhile;
            } else {
                echo 'Error in checking book!';
            }

            // Inserting book to the wishlist
            $sql = "INSERT INTO wishlist (book_id,customer_id) VALUE ($bid,$customer)";
            if ($num_bid <= 0) {

                if ($conn->query($sql) === TRUE) {

                    // Bootsrap alert
                    echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Book added to your wishlist!</strong>
                        </div>';

                }   

            } else {

                // Bootstrap alert
                echo'<div class="alert alert-danger alert-dismissible mt-2" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Book already added to your wishlist!</strong>
                    </div>';

            }
        }
    }
    
    // For removing item from cart

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM wishlist WHERE book_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] ='block';
        $_SESSION['message'] = 'Item removed from the wishlist';
        header('location:cart_details.php');
    }
?>
