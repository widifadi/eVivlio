<?php
    function book_item_card($conn, $book_id) {
        $book_query = "SELECT * FROM book WHERE book_id=$book_id;";
        $book_result = mysqli_query($conn, $book_query);
        $book_item = mysqli_fetch_assoc($book_result);

        $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];

        // display only first author
        $author_query = "SELECT * FROM author WHERE author.author_id IN 
                        (SELECT author_tag.author_id FROM author_tag 
                            WHERE author_tag.book_id=$book_id);";
        $author_result = mysqli_query($conn, $author_query);
        $author_row = mysqli_fetch_assoc($author_result);
        $author = $author_row['author_first_name'] . " " . $author_row['author_last_name'];
?>
    <div class="card text-center p-1 book">
        <a href="book_details.php?bookid=<?php echo $book_id?>">
            <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                alt='<?php echo $book_item['book_title'] ?>' >
            <br>
            <span class="book-title"><?php echo $book_item['book_title'] ?></span> <br>
            <span class="book-author">
                <?php echo $author ?>
                (<?php echo $book_item['publishing_year'] ?>)</span>
            <br>
            <span class="badge badge-pill badge-secondary book-price">€ <?php echo $book_item['price'] ?></span>
        </a>
        <br><br>
        <?php 
            // TODO if page is book_details.php
            // display stock number
        ?>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <em class="fas fa-cart-plus add-cart-btn" id="cart-<?php echo $book_id?>"></em>
            </div>
            <?php 
                if (isset($_SESSION['user'])) {
            ?>
            <div class="col">
                <em class="fas fa-heart add-wishlist-btn" id="wishlist-<?php echo $book_id?>"></em>
            </div>
            <?php
                }
            ?>
            <div class="col"></div>
        </div>
    </div>
<?php
    }
?>  
