<!DOCTYPE html>
<html lang="en">
<head>
    <title>eVivlío</title>

    <link rel="icon" href="../assets/img/open-book-back.png">

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <link href="../assets/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="navbar-brand"  id="logo">
            <a href="index.php">
                <img src="../assets/img/open-book-back.png" alt="eVivlío logo" 
                    width="30px" height="30px" 
                    style="display: block; margin: 0 auto; margin-top: 5px;">
            </a>
        </div>

        <button class="navbar-toggler" type="button" 
            data-toggle="collapse" data-target="#navbarNavAltMarkup" 
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="catalog.php?p=all_books">
                    <button class="btn menu-btn" id="catalog-btn">Book Catalogue</button>
                </a>
            </div>

            <div class="mx-auto">
                <!-- TODO error if empty -->
                <div class="input-group header-search" style="margin-left:100px;">
                    <input type="text" class="form-control search-box search-input" id="header-search-box"
                        placeholder="Search a book or author" 
                        aria-label="Search keyword" aria-describedby="search-button">
                    <div class="input-group-append">
                        <span class="input-group-text dark-search-button search-btn" id="header-search">
                            <em class="fas fa-search"></em>
                        </span>
                    </div>
                </div>
            </div>
            <div id="message" class="d-flex justify-content-center"></div>

            <div class="navbar-nav ml-auto">
                <!-- IF a user that is not admin is logged in -->
                <?php
                    session_start();
                    if (isset($_SESSION['user']) && $_SESSION['admin_permission'] == 0) {
                        
                        // This file is used for storing data coming from client to db
                        require "../database/database_functions.php";
                        $conn = db_connection();
                        // getting customer id
                        $userName = $_SESSION['user'];
                        $sql = "SELECT customer_id FROM user WHERE username = '$userName'";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()){
                                    $customer = $row['customer_id'];
                                }
                            } else {
                                echo "Error in getting customer id!";
                            }
                        // Check if $_SESSION['guest_cart'] is empty or not
                        // if not empty, store the session array into cart
                        if (isset($_SESSION['guest_cart'])) {
                            foreach ($_SESSION['guest_cart'] as $book_item_id => $guest_book_qty) {
                                // Check if $book_item_id has already in the cart
                                // if already there increment the quantity
                                $stmt = $conn->prepare("SELECT book_id,quantity FROM cart WHERE customer_id = $customer");
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($row = $result->fetch_assoc()) {

                                    // Initialize book id check
                                    $check = $row['book_id'];
                                    // Check if the book id with customer id already exist in the cart
                                    $num_bid = 0;
                                    foreach ($book_item_id as $val_check) {
                                        if ($val_check == $check) {
                                            $num_bid += 1;
                                        }
                                    }
                                    if ($num_bid <= 0) {
                                        // Insert new book
                                        $sql = "INSERT INTO cart (book_id,quantity,customer_id) VALUE ($book_item_id,$guest_book_qty,$customer)";
                                        if ($conn->query($sql) === TRUE) {
                
                                            // Bootsrap alert
                                            echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Your Cart is Updated</strong>
                                                </div>';
                        
                                        }
                                    } else {
                                        // Update quantity
                                        $new_qty = $row['quantity'] + $guest_book_qty;
                                        $sql = "UPDATE cart SET quantity = $new_qty WHERE book_id=$book_item_id AND customer_id = $customer";
                                        if ($conn->query($sql) === TRUE) {
                
                                            // Bootsrap alert
                                            echo'<div class="alert alert-success alert-dismissible mt-2" id="success-alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Your Cart is Updated!</strong>
                                                </div>';
                        
                                        }

                                    }
                                }
                            }
                        }
                ?>
                <a href="my_page.php">
                    <button class="btn menu-btn" id="mypage-btn">
                        <em class="fas fa-user"></em> My Page
                    </button>
                </a>

                <?php
                    }
                    // if user is not admin
                    if((!isset($_SESSION['user'])) ||
                        (isset($_SESSION['admin_permission']) && $_SESSION['admin_permission'] !=1))
                        {
                ?>
                <a href="cart.php">
                    <button class="btn menu-btn" id="cart-btn">
                        <em class="fas fa-shopping-cart"><span id="cart-item" class="badge badge-danger"></span></em>
                    </button>
                </a>

                <?php
                    }
                    // IF an admin user is logged in
                    if(isset($_SESSION['user']) && $_SESSION['admin_permission'] == 1) {
                ?>
                <a href="admin_page.php">
                    <button class="btn menu-btn" id="adminpage-btn">
                        <em class="fas fa-wrench"></em> Admin Page
                    </button>
                </a>

                <?php
                    }

                    // IF a user is not logged in
                    if(!isset($_SESSION['user'])) {

                ?>
                <a href="signup_login.php">
                    <button class="btn menu-btn" id="loginpage-btn">
                        <em class="fas fa-sign-in-alt"></em>
                    </button>
                </a>

                <?php
                    }

                    // IF a user is logged in
                    if(isset($_SESSION['user'])) {
                ?>
                
                <a href="../src/SignupLogin/logout_process.php">
                    <button class="btn menu-btn">
                        <em class="fas fa-sign-out-alt"></em>
                    </button>
                </a>
                <!-- close if statement -->
                <?php    
                    } 
                ?>
            </div>
        </div>
    </nav>