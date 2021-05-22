
<div class="card-columns" id="catalog">
<?php
    
   $conn = db_connection();
   $query= "SELECT book.book_id, book.book_cover, book.price, book.book_title FROM book JOIN category_tag 
   ON category_tag.book_id = book.book_id JOIN category ON category_tag.category_id = category.category_id 
   WHERE category.category_name='$category'";
   $query_run= mysqli_query($conn,$query);
   $check_books=mysqli_num_rows($query_run) > 0;
   if($check_books){
   while($row=mysqli_fetch_assoc($query_run))
   {
?>
   <a href="book_details.php?bookid=<?php echo $row['book_id']?>">
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
     }
   } else {
      echo "No book found.";
   }
      $conn->close();
 ?>
</div>
  