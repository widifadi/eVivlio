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
                    echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Book added to your cart!</strong>
                        </div>';

                }

            } else {

                // Bootstrap alert
                echo'<div class="alert alert-danger alert-dismissible mt-2" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Book already added to your cart!</strong>
                    </div>';

            }
        }
    } else {

        // If the user not logged in
            
        // Storing book id in session guest_cart
        if (!isset($_SESSION['guest_cart'])) {

            $_SESSION['guest_cart'] = array();
            if (isset($_POST['book_id'])) {
                // if book_id already exists
                if (isset($_SESSION['guest_cart'][$_POST['book_id']])) {
                    // increment book quantity
                    $_SESSION['guest_cart'][$_POST['book_id']]++;

                    // Bootstrap alert
                    echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                            Book already added to cart. please register or login to proceed with purchase.
                        </div>';
                } else {
                    // add new book 
                    $_SESSION['guest_cart'][$_POST['book_id']] = 1;

                    // Bootstrap alert
                    echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                            Book added to cart. please register or login to proceed with purchase.
                        </div>';
                }
            }
            
        } else {
            if (isset($_POST['book_id'])) {
                // if book_id already exists
                if (isset($_SESSION['guest_cart'][$_POST['book_id']])) {
                    // increment book quantity
                    $_SESSION['guest_cart'][$_POST['book_id']]++;

                    // Bootstrap alert
                    echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                            Book already added to cart. please register or login to proceed with purchase.
                        </div>';
                } else {
                    // add new book 
                    $_SESSION['guest_cart'][$_POST['book_id']] = 1;

                    // Bootstrap alert
                    echo'<div class="alert alert-warning alert-dismissible mt-2" id="success-alert">
                            Book added to cart. please register or login to proceed with purchase.
                        </div>';
                }
            }
        }
    } 

    // For removing item from cart

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM cart WHERE book_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] ='block';
        $_SESSION['message'] = 'Item removed from the cart';
        header('location:cart.php');
    }

    // For updating the quantity

    if(isset($_POST['qty'])){
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];

        $tprice = $qty*$pprice;

        $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
        $stmt->bind_param("isi",$qty,$tprice,$pid);
        $stmt->execute();
    }
    
?>