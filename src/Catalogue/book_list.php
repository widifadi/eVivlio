<?php require_once("../database/functions/database/database_functions.php"); ?> 
<!-- display book catalogue-->
<div class="card-columns" id="catalog">
 <?php
    $conn = db_connection();
    $query= 'SELECT book_cover, book_title, price FROM book';
    $query_run= mysqli_query($conn,$query);
    $check_books=mysqli_num_rows($query_run) > 0;
    if($check_books){
    while($row=mysqli_fetch_assoc($query_run))
    {
 ?>
    <a href="book_details.php">
        <div class="card text-center p-1 book" >
          <img class="card-img-top book-cover" src="../assets/img/book-covers/<?php echo $row['book_cover'];?>" 
                alt="<?php echo $row['book_cover'];?>" >
                <br>
                <span class="book-title"><?php echo $row['book_title'];?></span> <br>
                <!--<span class="book-author">J. R. R. Tolkien (1995)</span>
                <br>-->
                <span class="badge badge-pill badge-secondary book-price"><?php echo $row['price'];?></span>
        </div>
    </a>
 <?php
     }}
     

    else{
    echo "no book found";
    }
    CloseCon($conn);
 ?>
</div>

<!-- to display business books-->
<div class="card-columns" id="business">
 <?php
    $conn = db_connection();
    $book_id_query = "SELECT book_id FROM category_tag WHERE category_id='1'"; 
    $book_id_result = mysqli_query($conn, $book_id_query);
    $bookId= mysqli_fetch_assoc($book_id_result);
    $bookId= $user_id['user_id'];

    $query= 'SELECT * FROM book';
    $query_run= mysqli_query($conn,$query);
    $check_books=mysqli_num_rows($query_run) > 0;
    if($check_books){
    while($row=mysqli_fetch_assoc($query_run))
    {
 ?>
    <a href="book_details.php">
        <div class="card text-center p-1 book" >
          <img class="card-img-top book-cover" src="../assets/img/book-covers/<?php echo $row['book_cover'];?>" 
                alt="<?php echo $row['book_cover'];?>" >
                <br>
                <span class="book-title"><?php echo $row['book_title'];?></span> <br>
                <!--<span class="book-author">J. R. R. Tolkien (1995)</span>
                <br>-->
                <span class="badge badge-pill badge-secondary book-price"><?php echo $row['price'];?></span>
        </div>
    </a>
 <?php
     }}
     

    else{
    echo "no book found";
    }
    CloseCon($conn);
 ?>
</div>



