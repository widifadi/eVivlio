<?php
    require_once ('../database/database_functions.php');
    $conn  = db_connection();

    // declaring global variables
    $book_id = array();
    $book_title = array();
    $book_cover = array();
    $author_fn = array();
    $author_ln = array();
    $book_year = array();
    $book_price = array();
    $book_qty = array();
    $grand_total = 0;
    $num_items = 0;
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];

        // getting customer id
        $sql = "SELECT customer_id FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $customer = $row['customer_id'];
            }
        } else {
            echo "Error in getting customer ID!";
        }

        // For order summary
        $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                                JOIN author_tag ON author_tag.book_id = book.book_id 
                                JOIN author ON author.author_id = author_tag.author_id 
                                WHERE customer_id = $customer");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            // Initialize book id check
            $check = $row['book_id'];
            // Check if the book id with customer id already exist in the cart
            $num_bid = 0;
            foreach ($book_id as $val_check) {
                if ($val_check == $check) {
                    $num_bid += 1;
                }
            }
            if ($num_bid <= 0) {
                array_push($book_id, $row['book_id']);
                array_push($book_title,$row['book_title']);
                array_push($book_cover,$row['book_cover']);
                array_push($author_fn,$row['author_first_name']);
                array_push($author_ln,$row['author_last_name']);
                array_push($book_year,$row['publishing_year']);
                array_push($book_price,$row['price']*$row['quantity']);
                array_push($book_qty,$row['quantity']);

                $grand_total += $row['price']*$row['quantity'];
                $num_items += $row['quantity'];
            }
        }
    } 
    else {
        // for guests
        if (isset($_SESSION['guest_cart'])) {

            foreach ($_SESSION['guest_cart'] as $book_item_id => $guest_book_qty) {
            
                // query book and get only first author
                $query_book = "SELECT * FROM book 
                                JOIN author_tag ON author_tag.book_id = book.book_id 
                                JOIN author ON author.author_id = author_tag.author_id 
                                WHERE book.book_id = $book_item_id;";
                $book_result = mysqli_query($conn, $query_book);
                $book_row = mysqli_fetch_assoc($book_result);
    
                array_push($book_id, $book_item_id);
                array_push($book_title, $book_row['book_title']);
                array_push($book_cover, $book_row['book_cover']);
                array_push($author_fn, $book_row['author_first_name']);
                array_push($author_ln, $book_row['author_last_name']);
                array_push($book_year, $book_row['publishing_year']);
                array_push($book_price, $book_row['price'] * $guest_book_qty);
                array_push($book_qty, $guest_book_qty);
    
                $grand_total += ($book_row['price'] * $guest_book_qty);
                $num_items += $guest_book_qty;
            }

        } 
    }

?>

<div class="container" style="margin-top:100px;">

    <!-- Order Summary Section -->
    <div class="row">
        <div class="col-4">
            <div class="rounded-pill px-4 py-3 font-weight-bold" style="background-color:lightgray">
                Order summary
            </div>
            <div class="p-4">
                <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted" id="cart-number">Number of positions </strong>
                    <strong><?= number_format($num_items,0) ?></strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted" id="cart-total">Total</strong>
                    <h5 class="font-weight-bold"><strong>€ <?php echo $grand_total ?></strong></h5>
                </li>
                <?php 
                    if (isset($_SESSION['user']) && $num_items != 0) {
                ?>
                </ul>
                <a href="check_out.php" 
                    class="btn btn-warning rounded-pill py-2 btn-block">
                    Proceed to checkout
                </a>
                <?php
                    }
                ?>
                <?php 
                    if (!isset($_SESSION['user'])) {
                ?>
                </ul>
                <a href="signup_login.php" 
                    class="btn btn-warning rounded-pill py-2 btn-block">
                    Please login or register to purchase
                </a>
                <?php
                    }

                    if ($num_items != 0) {
                ?>
                </ul>
                <a href="../src/Cart/update_cart.php?clear=all" 
                    class="btn btn-danger rounded-pill py-2 btn-block" 
                    onclick="return confirm('Are you sure you want to clear all your cart?');">
                <i class="fas fa-trash"></i>&nbsp; Clear Cart
                </a>
                <?php
                    }
                ?>
                <!-- <button class="btn btn-primary" onclick="bootstrapAlert()">Try me!</button> --> 
            </div>
        </div>

        <!-- My Cart Section -->
        <div class="col-8">
            <div class="container catalog-breadcrumbs">
                <a href="cart.php"> My Cart </a> 
            </div>
            <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];} else {echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
            </div>
            <?php
                if (count($book_title) > 0) {
                    for ($x = 0; $x < count($book_title); $x++) {
            ?>
            <div class="row p-2 my-1">
                <div class="col-2">
                    <a href="../public/book_details.php?bookid=<?php echo $book_id[$x]?>" class="text-dark bid">
                        <img src="../assets/img/book-covers/<?= $book_cover[$x] ?>" alt="book" width="100px" id="book-cover">
                    </a>  
                </div>
                <div class="col-4">
                    <a href="../public/book_details.php?bookid=<?php echo $book_id[$x]?>">
                        <span class="book-title">"<?= $book_title[$x] ?>"</span>
                        <br>
                        <span class="book-author">
                            <?= $author_fn[$x], $author_ln[$x] ?> (<?= $book_year[$x] ?>)
                        </span>
                    </a>
                </div>
                <div class="col-2 bprice">
                    <strong>€ <?php echo $book_price[$x] ?></strong>
                </div>
                <div class="col-2">
                    <input type="number" class="form-control itemQty" 
                        id="<?=$book_id[$x]?>" value="<?=$book_qty[$x]?>" style="width:75px;">
                </div>
                <div class="col-2">
                    <a href="../src/Cart/update_cart.php?remove=<?=$book_id[$x]?>" class="text-danger" 
                        onclick="return confirm('Are you sure you want to remove this item?');">
                        <em class="fa fa-trash dlt-cart-btn"></em>
                    </a>
                    <?php 
                        if (isset($_SESSION['user'])) {
                    ?>
                    <em class="fas fa-heart add-wishlist-btn" id="wishlist-<?php echo $book_id[$x]?>"></em>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php 
                    }
                } else {
                    echo "Your Cart is Empty!";
                }  
                $conn->close(); 
            ?>
                            
        </div>
    </div>
</div>