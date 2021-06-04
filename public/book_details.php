<?php
    require_once("../templates/header.php");
?>

<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-3">
            <?php require_once("../src/Catalogue/categories.php"); ?>
        </div>
        <div class="col-9">
            <div class="catalog-breadcrumbs">
                <a href="catalog.php?p=all_books">Catalog</a> 
                <em class="fas fa-chevron-right" style="color: grey;"></em>
                <?php
                    if (isset($_GET['bookid'])) {
                        $book_id = $_GET['bookid'];

                        require_once("../database/database_functions.php");
                        $conn = db_connection();

                        $query_book = "SELECT book_title FROM book WHERE book_id=$book_id;";
                        $book_result = mysqli_query($conn, $query_book);
                        $book_row = mysqli_fetch_assoc($book_result);
                        $book_title = $book_row['book_title'];
                ?>
                    <a href="book_details.php?bookid=<?php echo $book_id ?>" > 
                        <?php echo $book_title ?> 
                    </a> 
                <?php
                    }
                ?>
            </div>
            <div id="message" class="d-flex justify-content-center"></div>
            <?php require_once("../src/Catalogue/book.php"); ?> 
        </div>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>
