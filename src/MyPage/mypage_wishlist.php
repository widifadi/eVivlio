<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <em class="fas fa-chevron-right" style="color: grey;"></em>
    <a href="#"> My Wishlist </a> 
</div> 
<?php 

    /*if(session_id() == ''){
        //session has not started
        session_start();

        // This file is used for storing data coming from client to db
        require "../../database/database_functions.php";
        $conn = db_connection();

    }*/

    // declaring global variables
    $book_id = array();
    $book_title = array();
    $book_cover = array();
    $author_fn = array();
    $author_ln = array();
    $book_year = array();

    // Need to query based on customer id or guest id 
    if (isset($_SESSION['user'])) {
        $userName = $_SESSION['user'];

        // getting customer id
        $sql = "SELECT customer_id FROM user WHERE username = '$userName'";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $customer = $row['customer_id'];
                }
            } else {
                echo "Error in getting customer id!";
            }
    }

    $stmt = $conn->prepare("SELECT * FROM wishlist 
                            JOIN book ON book.book_id = wishlist.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()):

        // Initialize book id check
        $check = $row['book_id'];
        // Check if the book id with customer id already exist in the wishlist
        $num_bid = 0;
        foreach ($book_id as $val_check) {
            if ($val_check == $check) {
                $num_bid += 1;
            }
        }

        if ($num_bid <= 0) {
            array_push($book_id,$row['book_id']);
            array_push($book_title,$row['book_title']);
            array_push($book_cover,$row['book_cover']);
            array_push($author_fn,$row['author_first_name']);
            array_push($author_ln,$row['author_last_name']);
            array_push($book_year,$row['publishing_year']);
        }

    endwhile;
    
    for ($x = 0; $x < count($book_title); $x++) {?> 
    <div class="row p-2 wl-book">
        <div class="col-2">
            <a href="../public/book_details.php?bookid=<?php echo $book_id[$x]?>">
                <img src="../assets/img/book-covers/<?= $book_cover[$x]?>" alt="book" width="100px" id="book-cover">
            </a>
        </div>
        <div class="col-7">
            <a href="../public/book_details.php?bookid=<?php echo $book_id[$x]?>">
                <span class="book-title">"<?= $book_title[$x]?>"</span>
                <br>
                <span class="book-author"><?= $author_fn[$x]?> <?= $author_ln[$x] ?> (<?= $book_year[$x] ?>)</span>
            </a>
        </div>
        <div class="col-3">
            <div class="row mt-3 ml-3">
                <div class="col">
                    <em class="fas fa-cart-plus add-cart-btn" id="cart-<?= $book_id[$x]?>"></em><!-- error getting the correct book id -->
                </div>
                <div class="col">
                    <a href="../src/MyPage/wishlist_button.php?remove=<?=$book_id[$x]?>" class="text-danger" 
                        onclick="return confirm('Are you sure you want to remove this item?');">
                        <em class="fa fa-trash dlt-cart-btn"></em>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
