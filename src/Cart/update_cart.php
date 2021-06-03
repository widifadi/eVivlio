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

        // For removing item from cart

        if(isset($_GET['remove'])){
            $id = $_GET['remove'];

            $stmt = $conn->prepare("DELETE FROM cart WHERE book_id = ? AND customer_id = $customer");
            $stmt->bind_param("i",$id);
            $stmt->execute();

            $_SESSION['showAlert'] ='block';
            $_SESSION['message'] = 'Item removed from the cart';
            header('location:../../public/cart.php');
        }
    } else {

        // if you are guest
        if(isset($_GET['remove'])){
            $id = $_GET['remove'];

            unset($_SESSION['guest_cart'][$id]);
            $_SESSION['showAlert'] ='block';
            $_SESSION['message'] = 'Item removed from the cart';
            header('location:../../public/cart.php');
        }

    }

    // For updating the quantity

    if(isset($_POST['quantity'])){
        $qty = $_POST['quantity'];
        $bid = $_POST['book_id'];
        $bprice = $_POST['price'];

        $bprice = $qty*$pprice;

        $stmt = $conn->prepare("UPDATE cart SET quantity=?, total_price=? WHERE book_id=? AND customer_id = $customer");
        $stmt->bind_param("isi",$qty,$bprice,$bid);
        $stmt->execute();
    }
?>