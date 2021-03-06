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

        if(isset($_POST['quantity'])){
            $qty = $_POST['quantity'];
            $bid = $_POST['book_id'];

            $sql = "SELECT price FROM book WHERE book_id = '$bid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        $bprice = $row['price'];
                    }
                } else {
                    echo "Error in getting book price!";
                }

            $total_price = $qty*$bprice;

            $stmt = $conn->prepare("UPDATE cart SET quantity=?, total_price=? WHERE book_id=? AND customer_id = $customer");
            $stmt->bind_param("iii",$qty,$total_price,$bid);
            $stmt->execute();
        }
    } else {
        
        // If you are guest
        if(isset($_POST['quantity'])){
            $bid = $_POST['book_id'];

            $sql = "SELECT price FROM book WHERE book_id = '$bid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        $bprice = $row['price'];
                    }
                } else {
                    echo "Error in getting book price!";
                }

            $total_price = $qty*$bprice;
            $_SESSION['guest_cart'][$bid] = $_POST['quantity'];;
        }

    }

    // Clear all function for cart 
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
    
        if(isset($_GET['clear'])){
            $stmt = $conn->prepare("DELETE FROM cart WHERE customer_id = '$customer'");
            $stmt->execute();

            $_SESSION['showAlert'] ='block';
            $_SESSION['message'] = 'All item removed from the cart';
            header('location:../../public/cart.php');
        }
    } else {

        // if you are a guest
        if(isset($_GET['clear'])){
            unset($_SESSION['guest_cart']);

            $_SESSION['showAlert'] ='block';
            $_SESSION['message'] = 'All item removed from the cart';
            header('location:../../public/cart.php');
        }
    }
?>