<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href="#"> My Wishlist </a> 
</div> 
<div class="col "> 
<div id="message"></div>
<?php 
    // Need to query based on customer id or guest id 
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

    $stmt = $conn->prepare("SELECT * FROM wishlist 
                            JOIN book ON book.book_id = wishlist.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()): ?> 
    <div class="row wl-book mt-4">
        <div class="col-2">
            <img src="../assets/img/book-covers/<?= $row['book_cover'] ?>" alt="book" width="100px" id="book-cover">
        </div>
        <div class="col-6">
            <div class="row mt-3 ml-3">
                <div id="book-title"> <a href="#" class="text-dark">"<?= $row['book_title'] ?>", <?= $row['author_first_name'], $row['author_last_name'] ?> (<?= $row['publishing_year'] ?>)</a></div>
            </div>
        </div>
        <div class="col-2">
            <div class="row mt-3 ml-3">
                <em class="fas fa-cart-plus add-cart-btn" id="cart-<?php $row['book_id']?>"></em> <!-- error getting the correct book id -->
            </div>
        </div>
        <div class="col-2">
            <div class="row mt-3 ml-3">
                <em class="fa fa-trash dlt-cart-btn"></em>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>

<!-- Need to add button functionality to add to cart from wishlist and to delete item from wishlist -->