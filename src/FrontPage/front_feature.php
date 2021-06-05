
<?php require_once("../database/database_functions.php"); ?>

<div class=" features-div">

    <div id="best-sellers" class="frontpage-feature">
        <span class="subtitle">Best Sellers</span>
            <div class="row">
                <?php
                    $conn = db_connection();
                    $best_sellers = get_featured_books_list($conn, "Best Sellers");

                    $counter = 0;
                    foreach($best_sellers as $key=>$best_seller_id) {
                        if (++$counter == 6) {
                            break;
                        }
                ?>
                    <div class="col-sm featured-book-div">
                        <?php
                            $book_query = "SELECT * FROM book WHERE book_id=$best_seller_id;";
                            $book_result = mysqli_query($conn, $book_query);
                            $book_item = mysqli_fetch_assoc($book_result);
                            $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];
                        ?>
                        <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                            <img class="feature-book-cover featured-book-image" src='<?php echo $book_cover ?>'
                                alt='<?php echo $book_item['book_title'] ?>' >
                            <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                        </a>
                    </div>    
              <?php 
                  }
              ?>
          </div>
    </div>

    <div id="new-release" class="frontpage-feature">
        <span class="subtitle">New Release</span>
        <div class="row">
              <?php
                  $conn = db_connection();
                  $best_sellers = get_featured_books_list($conn, "Editor Recommends");

                  $counter = 0;
                  foreach($best_sellers as $key=>$best_seller_id) {
                    if (++$counter == 6) {
                        break;
                    }
                ?>
                    <div class="col-sm featured-book-div">
                        <?php
                            $book_query = "SELECT * FROM book WHERE book_id=$best_seller_id;";
                            $book_result = mysqli_query($conn, $book_query);
                            $book_item = mysqli_fetch_assoc($book_result);
                            $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];
                        ?>
                        <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                            <img class="feature-book-cover featured-book-image" src='<?php echo $book_cover ?>'
                                alt='<?php echo $book_item['book_title'] ?>' >
                            <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                        </a>
                    </div>    
                <?php 
                    }
                ?>
          </div>
    </div>

    <div id="editors-pick" class="frontpage-feature">
        <span class="subtitle">Editor's Pick</span>
        <div class="row">
            <?php
                $conn = db_connection();
                $best_sellers = get_featured_books_list($conn, "New Release");

                $counter = 0;
                foreach($best_sellers as $key=>$best_seller_id) {
                if (++$counter == 6) {
                    break;
                }
            ?>
                <div class="col-sm featured-book-div">
                    <?php
                        $book_query = "SELECT * FROM book WHERE book_id=$best_seller_id;";
                        $book_result = mysqli_query($conn, $book_query);
                        $book_item = mysqli_fetch_assoc($book_result);
                        $book_cover = '../assets/img/book-covers/' . $book_item['book_cover'];
                    ?>
                    <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                        <img class="feature-book-cover featured-book-image" src='<?php echo $book_cover ?>'
                            alt='<?php echo $book_item['book_title'] ?>' >
                        <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                    </a>
                    </div>
            <?php 
                }
            ?>
          </div>
    </div>

</div>