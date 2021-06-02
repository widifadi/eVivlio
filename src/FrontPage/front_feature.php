
<?php require_once("../database/database_functions.php"); ?>
<?php require_once("../src/Common/book_card.php"); ?>

<div class="container features-div">

    <div id="best-sellers">
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
                      <div class="card text-center p-1 book">
                      <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                          <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                              alt='<?php echo $book_item['book_title'] ?>' width="100" >
                          <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                      </a>
                      </div>
                    </div>    
              <?php 
                  }
              ?>
          </div>
    </div>

    <div id="new-release">
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
                      <div class="card text-center p-1 book">
                      <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                          <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                              alt='<?php echo $book_item['book_title'] ?>' width="100" >
                          <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                      </a>
                      </div>
                    </div>    
              <?php 
                  }
              ?>
          </div>
    </div>
    <div id="editors-pick" >
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
                      <div class="card text-center p-1 book">
                      <a href="book_details.php?bookid=<?php echo $best_seller_id?>">
                          <img class="card-img-top book-cover" src='<?php echo $book_cover ?>'
                              alt='<?php echo $book_item['book_title'] ?>' width="100" >
                          <div class="featured-book-middle"><?php echo $book_item['book_title'] ?></div>
                      </a>
                      </div>
                    </div>    
              <?php 
                  }
              ?>
          </div>
    </div>

</div>