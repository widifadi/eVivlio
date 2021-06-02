<?php
    //session_start();
    require_once ('../database/database_functions.php');
    $conn  = db_connection();

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
    }

    // Fetching information from cart table based on guest ID or customer ID
    // Add WHERE customer or guest id to select the cart item 
    // For order summary
    $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
    $grand_total = 0;
    $num_items = 0;
    while ($row = $result->fetch_assoc()):
        $grand_total += $row['price'];
        $num_items += 1;
    endwhile; 
    // For cart section
    $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<div class="container" style="margin-top:100px; margin-left: 10px;">

    <!-- Order Summary Section -->
    <div class="row">
        <div class="col-4" style="">
            <div class="row">
                <div class="col">
                <div class="bg-light rounded-pill px-4 py-3 font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted" id="cart-number">Number of positions </strong>
                            <strong><?= number_format($num_items,0) ?></strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted" id="cart-total">Total</strong>
                            <h5 class="font-weight-bold"><b><i class="fas fa-euro-sign"></i>
                            &nbsp; <?= number_format($grand_total,2) ?></b></h5>
                        </li>
                        <?php 
                            if (isset($_SESSION['user'])) {
                        ?>
                        </ul><a href="#" class="btn btn-warning rounded-pill py-2 btn-block">Procceed to checkout</a>
                        <?php
                            }
                        ?>
                        <?php 
                            if (!isset($_SESSION['user'])) {
                        ?>
                        </ul><a href="#" class="btn btn-warning rounded-pill py-2 btn-block">Login or Register</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Cart Section -->
        <div class="col-8">
            <div class="container catalog-breadcrumbs">
                <a href="cart.php"> My Cart </a> 
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table" >
                        <tbody >
                                <?php while ($row = $result->fetch_assoc()): ?> <!-- ../assets/img/book-covers/Book Cover/bestseller/Amara The Brave.jpg -->
                            <tr>
                            <th scope="row" class="border-0" >
                                <div class="p-2">
                                <img src="../assets/img/book-covers/<?= $row['book_cover'] ?>" alt="book" width="100px" id="book-cover">
                                <div class="ml-3 d-inline-block align-middle">
                                    <a href="#" class="text-dark"><div class="book-title" id="book-title">"<?= $row['book_title'] ?>", <?= $row['author_first_name'], $row['author_last_name'] ?> (<?= $row['publishing_year'] ?>)</div></a>
                                </div>
                                </div>
                            </th>
                            <td class="border-0 align-middle book-price" style="background:white;" 
                                id="book-price"><strong><i class="fas fa-euro-sign"></i>&nbsp;<?= $row['price'] ?></strong></td>
                            <td class="border-0 align-middle book-price" style="background:white;" 
                                id="book-quantity"><input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:75px;"><strong></strong></td>
                            <td class="border-0 align-middle book-price" style="background:white;">
                                <a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                            <td class="border-0 align-middle book-price" style="background:white;">
                                <a href="#" class="text-dark"><i class="fa fa-heart"></i></a></td>
                            </tr>
                                <?php endwhile; $conn->close(); ?>
                            
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>