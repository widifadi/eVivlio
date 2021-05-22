<div class="container">
    Results for: <span id="search-keyword" style="color:#F28705">
        <?php echo $_GET["search"]; ?>
    </span>

    <div class="card-columns" id="book-list">

    <?php
        $keyword = $_GET["search"];

        require_once("../database/database_functions.php");
        $conn = db_connection();

        // TODO author keyword

        $query = "SELECT * FROM book WHERE book_title LIKE '%$keyword%'; "; 
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

                $author_query = "SELECT * FROM author WHERE author.author_id IN 
                                (SELECT author_tag.author_id FROM author_tag 
                                    WHERE author_tag.book_id=$book_id);";
                $author_result = mysqli_query($conn, $author_query);
                $author_row = mysqli_fetch_assoc($author_result);

                $author = $author_row['author_first_name'] . $author_row['author_last_name'];

                $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];
    ?>
    <a href="book_details.php?bookid=<?php echo $book_id?>">
        <div class="card text-center p-1 book" id="The_Lord_of_the_Rings">
            <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                alt='<?php echo $book_item['book_title'] ?>' >
            <br>
            <span class="book-title"><?php echo $book_item['book_title'] ?></span> <br>
            <span class="book-author">
                <?php echo $author ?>
                (<?php echo $book_item['publishing_year'] ?>)</span>
            <br>
            <span class="badge badge-pill badge-secondary book-price">€<?php echo $book_item['price'] ?></span>
            <br><br>
            <em class="fas fa-cart-plus add-cart-btn"></em>
            <em class="fas fa-heart add-wlist-btn"></em>

        </div>
    </a>
    

    <?php        
            }
        }
        $conn->close();
    ?>
    </div>
</div>