<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href=""> My Wishlist </a> 
</div> 
<div class="col "> 
<?php 
    // Need to query based on customer id or guest id 
    $stmt = $conn->prepare("SELECT * FROM wishlist 
                            JOIN book ON book.book_id = wishlist.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()): ?> 
    <div class="row wl-book">
        <div class="col-2">
            <img src="<?= $row['book_cover'] ?>" alt="book" width="100px" id="book-cover">
        </div>
        <div class="col-4">
            <div class="row mt-3 ml-3">
                <div id="book-title"> <a href="#" class="text-dark">"<?= $row['book_title'] ?>", <?= $row['author_first_name'], $row['author_last_name'] ?> (<?= $row['publishing_year'] ?>)</a></div>
            </div>
            <div class="row mt-3 ml-3">
                <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
<?php endwhile; $conn->close(); ?>
</div>

<!-- Need to add button functionality to add to cart from wishlist and to delete item from wishlist -->