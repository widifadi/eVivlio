
<?php
require_once("../database/functions/database/database_functions.php");
$conn = db_connection();
$bookId=$_GET["bookid"];

    $query= "SELECT * FROM book JOIN category_tag ON category_tag.book_id = book.book_id JOIN category ON 
    category_tag.category_id = category.category_id JOIN publisher ON 
    publisher.publisher_id = book.publisher_id 
    JOIN author_tag ON author_tag.book_id = book.book_id 
    JOIN author ON author.author_id = author_tag.author_id 
    WHERE book.book_id='$bookId'";
    $query_run= mysqli_query($conn,$query);
    $check_books=mysqli_num_rows($query_run) > 0;
    
    if($check_books){
        $x=1;
   while( $row=mysqli_fetch_assoc($query_run)){
    $book["cover"]=$row['book_cover'];
    $book["title"]=$row['book_title']; 
    $book["isbn"]=$row['isbn']; 
    $book["year"]=$row['publishing_year']; 
    $book["pages"]=$row['pages']; 
    $book["summary"]=$row['summary']; 
    $book["price"]=$row['price']; 
    $book["stock"]=$row['stock']; 
    $book["publisher"]=$row['publisher']; 
    $book_category[$x]=$row['category_name']; 
    $book_author[$x]=$row['author_first_name']." ".$row['author_last_name']; 
    $x++;
    
   }
    }
        else{
            echo "no book found";
            }
    $conn->close();

?>

<div class="row book-details" style="padding: 5px; margin-top:10px;">
    <div class="col-4 book-detail-preview text-center">
        <img src="../assets/img/book-covers/<?php echo $book['cover'];?>" 
        alt="Lord of the Rings" width="200">
        <br>
        <span class="book-title"><?php echo $book['title'];?></span> <br>
        <!--<span class="book-author">J. R. R. Tolkien (1995)</span> <br>-->
        <span class="badge badge-pill badge-secondary book-price">€<?php echo $book['price'];?></span>
        <br>
        <br>
        <span style="color: #396273">
        Stocks available:<span class="stock-detail"><?php echo $book['stock'];?></span>
        </span>
        <br>
        <br>
        <!-- Add to cart and and to wishlish functionality --> 
        <form action="" class="form-submit">
            <input type="hidden" class="pid" value="<?= $bookId ?>">
            <input type="hidden" class="cid" value="<?= $customerId ?>">

            <em class="fas fa-cart-plus add-cart-btn"></em>
        </form>
        <form action="" class="form-submit">
            <input type="hidden" class="pid" value="<?= $bookId ?>">
            <input type="hidden" class="cid" value="<?= $customerId ?>">

            <em class="fas fa-heart add-wlist-btn"></em>
        </form>
    </div>

    <div class="col-8 book-detail-div">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active book-detail-tab" id="summary-tab" 
                    data-toggle="tab" href="#summary" role="tab" 
                    aria-controls="summary" aria-selected="true">Summary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link book-detail-tab" id="details-tab" 
                    data-toggle="tab" href="#details" role="tab" 
                    aria-controls="details" aria-selected="false">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link book-detail-tab" id="review-tab" 
                    data-toggle="tab" href="#reviews" role="tab" 
                    aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <!-- Tabs navs -->
        
        <!-- Tabs content -->
        <div class="tab-content" id="myTabContent" style="border: solid 1px #F2F2F2;">
            <div class="tab-pane fade show active" id="summary" role="tabpanel" 
                aria-labelledby="summary-tab" style="font-size: 14px; padding: 10px;">
                <p><?php echo $book['summary'];?> </p>
            </div>
            <div class="tab-pane fade" id="details" role="tabpanel" 
                aria-labelledby="details-tab" style="padding: 10px;">
                Publisher: <span class="publisher"><?php echo $book['publisher'];?></span>
                <br>
                Publication Year: <span class="publishing-year"><?php echo $book['year'];?></span>
                <br>
                ISBN: <span class="isbn"><?php echo $book['isbn'];?></span>
                <br>
                Number of Pages: <span class="pages"><?php echo $book['pages'];?></span>
                <br>
                Author:<span class="pages"><?php 
                              foreach($book_author as $val) {echo "$val, ";}
                               ?></span>
                <br>
                Categories:<span class="pages"><?php 
                              foreach($book_category as $val) {echo "$val, ";}
                               ?></span>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" 
                aria-labelledby="reviews-tab" style="padding: 10px;">
                <div class="book-reviews">
                    <div class="card">
                        <div class="card-body">
                            <div id="average-rating">
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating"></span>
                                <span class="fa fa-star user-rating"></span>
                            </div>
                            <blockquote class="blockquote mb-0">
                            <p>A customer's review.</p>
                            <footer class="blockquote-footer">
                                <cite title="username" id="username">Reviewer_username</cite>
                            </footer>
                            </blockquote>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div id="average-rating">
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating checked"></span>
                                <span class="fa fa-star user-rating"></span>
                            </div>
                            <blockquote class="blockquote mb-0">
                            <p>Another customer's review.</p>
                            <footer class="blockquote-footer">
                                <cite title="username" id="username">Reviewer_username</cite>
                            </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <br> 
                <br>
                <div class="card text-center">
                    <div class="card-header" style="color:#396273;">
                        Post a Review
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <div class="rate mx-auto" id="book-rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="raratingte" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <em class="fa fa-comment" style="color:#396273;"></em>
                                        </div>
                                    </div>
                                    <textarea class="form-control" rows="5" id="review" name="review" 
                                        placeholder="Write a review." required></textarea>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn yellow-theme-btn mb-2" 
                                    name="submit-review-btn" style="width:100%;">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Tabs content -->
        
    </div>

</div>

    <!-- Ajax Code for cart -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".add-cart-btn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var cid = $form.find(".cid").val();
                

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {pid:pid,cid:cid},
                    success:function(response){
                        $("#message").html(response);
                        load_cart_item_number();
                    }
                });
            });

            $(".add-wlist-btn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var cid = $form.find(".cid").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {pid:pid,cid:cid},
                    success:function(response){
                        $("#message").html(response);
                    }
                });
            });

            load_cart_item_number();

            // function to display item number on cart icon 
            function load_cart_item_number(){
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {cartItem:"cart_item"},
                    success: function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>