<?php
    $book_results = $_POST['book_results'];
?>

<div class="card-columns" id="book-list">
    <?php 
        foreach($book_results as $book_item) {
            $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];
    ?>
    <a href="book_details.php">
        <div class="card text-center p-1 book" id="The_Lord_of_the_Rings">
            <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                alt='<?php echo $book_item['book_title'] ?>' >
            <br>
            <span class="book-title"><?php echo $book_item['book_title'] ?></span> <br>
            <span class="book-author" style="font-style: italic;">
                <?php echo $book_item['author_firstname'] ?> <?php echo $book_item['author_lastname'] ?>
                (<?php echo $book_item['publishing_year'] ?>)
            </span>
            <br>
            <span class="badge badge-pill badge-secondary book-price">€<?php echo $book_item['price'] ?></span>
            <br>
            <br>
            <em class="fas fa-cart-plus add-cart-btn"></em>
            <em class="fas fa-heart add-wlist-btn"></em>
        
        </div>
    </a>
    <?php 
        }
    ?>

</div>
