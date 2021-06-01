<div class="container">
    Results for: <span id="search-keyword" style="color:#F28705">
        <?php echo $_GET["search"]; ?>
    </span>

    <div class="card-columns" id="book-list">

    <?php
        $keyword = $_GET["search"];

        require_once("../database/database_functions.php");
        require_once("../src/Common/book_card.php");
        $conn = db_connection();

        $query = "SELECT DISTINCT book.book_id, book.book_title, book.book_cover, 
                        book.publishing_year, book.price 
                    FROM book LEFT OUTER JOIN author_tag ON book.book_id = author_tag.book_id 
                    RIGHT OUTER JOIN author ON author.author_id = author_tag.author_id 
                    WHERE book.book_title LIKE '%$keyword%' 
                    OR author.author_first_name LIKE '%$keyword%' 
                    OR author.author_last_name LIKE '%$keyword%' ; ";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0) {
        ?>
            <span style="font-size:30px;">¯\_(ツ)_/¯</span>
            <span>No book found.</span>
        
        <?php
        } else {
            while ($book_item = mysqli_fetch_assoc($result)) 
            {
                $book_id = $book_item['book_id'];
                book_item_card($conn, $book_id);
    ?>

    <?php        
            }
        }
        if (isset($conn)) { 
            mysqli_close($conn);
        }
    ?>
    </div>
</div>