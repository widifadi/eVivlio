<?php
    session_start();

    require '../database/database_functions.php';

    // This is the part add to cart button functionality
    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pisbn = $_POST['pisbn'];
        $pqty = 1;

        $stmt = $conn->prepare("SELECT isbn FROM cart WHERE isbn=?");
        $stmt->bind_param("s",$pisbn);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $isbncode = $r['isbn']; // error fetch as null array

        // This is the part to show notification if the book is added or already added to the cart
        if(!$isbncode){
            $query = $conn->prepare("INSERT INTO cart (Name,price,image,qty,total_price,isbn) VALUE (?,?,?,?,?,?)");
            $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pisbn);
            $query->execute();

            // Bootsrap alert

            echo'<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Book added to your cart!</strong>
                </div>';
        } 
        else{
            echo'<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Book already added to your cart!</strong>
                </div>';
        }
    }

    // This is the part to calculate the number of item in cart 
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows();

        echo $rows;
    }

    // Functionality to remove button 
    if(isset($_GET['remove'])){
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] ='block';
        $_SESSION['message'] = 'Item removed from the cart';
        header('location:cart.php');
    }

    if(isset($_GET['clear'])){
        $stmt = $conn->prepare("DELETE FROM cart");
        $stmt->execute();

        $_SESSION['showAlert'] ='block';
        $_SESSION['message'] = 'All item removed from the cart';
        header('location:cart.php');
    }

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