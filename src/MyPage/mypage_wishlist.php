<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href="#"> My Wishlist </a> 
</div> 
<div class="col "> 
<?php 

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
            } else {
                continue;
            }
        }

        if ($num_bid <= 0) {
            array_push($book_id,$row['book_id']);
            array_push($book_title,$row['book_title']);
            array_push($book_cover,$row['book_cover']);
            array_push($author_fn,$row['author_first_name']);
            array_push($author_ln,$row['author_last_name']);
            array_push($book_year,$row['publishing_year']);
        } else {
            continue;
        }

    endwhile;
    
    for ($x = 0; $x < count($book_title); $x++) {?> 
    <div class="row wl-book">
        <div class="col-2">
            <img src="../assets/img/book-covers/<?= $book_cover[$x]?>" alt="book" width="100px" id="book-cover">
        </div>
        <div class="col-4">
            <div class="row mt-3 ml-3">
                <div id="book-title"> <a href="#" class="text-dark">"<?= $book_title[$x]?>", <?= $author_fn[$x]?>,<?= $author_ln[$x] ?> (<?= $book_year[$x] ?>)</a></div>
            </div>
            <div class="row mt-3 ml-3">
                <em class="text-dark fas fa-cart-plus add-cart-btn" id="cart-<?= $book_id[$x]?>"></em>&nbsp;&nbsp; <!-- error getting the correct book id -->
                <a href="wishlist_button.php?remove=<?=$book_id[$x]?>" class="text-danger" onclick="return confirm('Are you sure you want to remove this item?');"><em class="fa fa-trash dlt-cart-btn"></em></a>
            </div>
        </div>
    </div>
<?php } $conn->close(); ?>
</div>