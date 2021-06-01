
<?php
    require_once("../database/database_functions.php");
    require_once("../src/Common/book_card.php");

    $conn = db_connection();
    $bookId = $_GET["bookid"];

    $query= "SELECT * FROM book WHERE book_id='$bookId';";
    $query_run= mysqli_query($conn,$query);
    $check_books=mysqli_num_rows($query_run) > 0;
    
    if ($check_books) {
        $x=1;
        while($row=mysqli_fetch_assoc($query_run)) {
            $isbn = $row['isbn']; 
            $publishing_year = $row['publishing_year']; 
            $pages = $row['pages']; 
            $book["summary"] = $row['summary']; 
            $stock = $row['stock']; 
            $publisher_id = $row['publisher_id']; 
            $x++;
        }
    } else {
        echo "No book found";
    }
        $reviewContent=[];//Initialize Array to store Book Review Content
        $reviewer=[];//Initialize Array to store customer name who review the book
        $bookRating=array(0,0);//Initialize Array to store book rating
        $reviewQuery= "SELECT book_review.content, book_review.rating, customer.first_name,
        customer.last_name FROM book_review LEFT JOIN customer ON customer.customer_id=book_review.customer_id
        where book_id='$bookId' ORDER BY RAND()*10 LIMIT 2";
        $reviewQuery_run= mysqli_query($conn,$reviewQuery);
        $checkReviewRow=mysqli_num_rows($reviewQuery_run) > 0;
        if ($checkReviewRow) {
            $index = 0;
            while($reviewRow=mysqli_fetch_assoc($reviewQuery_run)){
                $reviewContent[$index]=$reviewRow['content'];
                $reviewer[$index]=$reviewRow['first_name']." ".$reviewRow['last_name'];
                $bookRating[$index]=$reviewRow['rating'];
                $index++;
        } 
    }
            
    $conn->close();

?>
<div id="message"></div>
<div class="row book-details" style="padding: 5px; margin-top:10px;">
    <div class="col-4 book-detail-div text-center">
        <?php
            $conn = db_connection();
            book_item_card($conn, $bookId);
        ?>
        <br>
        Stock Available: <?php echo $stock ?>
        <br>
        <br>
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
                <p><?php echo $book['summary']; ?> </p>
            </div>
            <div class="tab-pane fade" id="details" role="tabpanel" 
                aria-labelledby="details-tab" style="padding: 10px;">
                <strong>ISBN:</strong> <?php echo $isbn; ?><br>
                <strong>Author(s):</strong> <?php echo get_book_authors($conn, $bookId) ?> <br>
                <strong>Publisher:</strong> <?php echo get_book_publisher($conn, $publisher_id) ?> <br>
                <strong>Publication Year:</strong> <?php echo $publishing_year; ?> <br>
                <strong>Number of Pages:</strong> <?php echo $pages; ?> <br>
                <strong>Categories:</strong> <?php echo get_book_categories($conn, $bookId) ?>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" 
                aria-labelledby="reviews-tab" style="padding: 10px;">
                <div class="book-reviews">
                    <div class="card">
                        <div class="card-body">
                            <div id="average-rating">
        <!------------------------PHP------------------------------------------>                    
                            <?php 
                                for ($x=0;$x<$bookRating[0];$x++) {
                                    echo '<span class="fa fa-star user-rating checked"></span>'; 
                                }
                                for ($x=$bookRating[0]+1;$x<=5;$x++) {
                                    echo '<span class="fa fa-star user-rating"></span>'; 
                                }
                            ?>
        <!------------------------PHP END------------------------------------------>                 
                                
                            </div>
                            <blockquote class="blockquote mb-0">
                            <p>
        <!------------------------PHP------------------------------------------>  
                            <?php 
                                if (!empty($reviewContent[0])) {
                                    echo $reviewContent[0];
                                } else {
                                    echo "No Review";
                                }
                            ?>
         <!------------------------PHP END------------------------------------------>                    
                            </p>
                            <footer class="blockquote-footer">
                                <cite title="username" id="username">
         <!------------------------PHP------------------------------------------>                        
                                <?php 
                                    if(!empty($reviewContent[0])) {
                                        if($reviewer[0]=="NULL NULL") {
                                            echo "Anonymous User";
                                        } else {
                                            echo $reviewer[0]; 
                                        }
                                    } else {
                                        echo "Reviewer_username";
                                    }
                                ?>
         <!------------------------PHP END------------------------------------------>                    
                                </cite>
                            </footer>
                            </blockquote>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div id="average-rating">
         <!------------------------PHP------------------------------------------>                    
                            <?php 
                            for($x=0;$x<$bookRating[1];$x++){
                                echo '<span class="fa fa-star user-rating checked"></span>';}
                             for($x=$bookRating[1]+1;$x<=5;$x++){
                                echo '<span class="fa fa-star user-rating"></span>';}
                                ?>
         <!------------------------PHP END------------------------------------------>                        
                               
                            </div>
                            <blockquote class="blockquote mb-0">
                            <p>
         <!------------------------PHP------------------------------------------>                    
                            <?php 
                                if (!empty($reviewContent[1])) {
                                    echo $reviewContent[1];
                                } else {
                                    echo "No Review"; 
                                }
                             ?>
         <!------------------------PHP END------------------------------------------>                     
                             </p>
                            <footer class="blockquote-footer">
                                <cite title="username" id="username">
         <!------------------------PHP------------------------------------------>                        
                                <?php 
                            if(!empty($reviewContent[1])){
                               if($reviewer=="NULL NULL")
                               echo "Anonymous";
                               else 
                               echo $reviewer[1]; }
                            else
                            echo "Reviewer_username" 
                               ?>
         <!------------------------PHP END------------------------------------------>                       
                                </cite>
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
                        <form action="../src/Catalogue/post_book_review.php?bookid=<?php echo $bookId?>" method="POST">
                            <div class="form-group row">
                                <div class="rate mx-auto" id="book-rating">
                                    <input type="radio" id="star1" name="rating" value="5" />
                                    <label for="star1" title="text">1 stars</label>
                                    <input type="radio" id="star2" name="rating" value="4" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star4" name="rating" value="2" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star5" name="rating" value="1" />
                                    <label for="star5" title="text">5 star</label>
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
    <!-- TODO use cart.js -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".add-cart-btn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".bookId").val();

                $.ajax({
                    url: '../src/Cart/add_cart.php',
                    method: 'post',
                    data: {pid:pid},
                    success:function(response){
                        $("#message").html(response);
                    }
                });
            });
        });
    </script>