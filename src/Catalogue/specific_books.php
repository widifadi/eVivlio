
<div class="card-columns" id="catalog">

<?php
    require_once("../src/Common/book_card.php");
    
    $conn = db_connection();
    $query= "SELECT book.book_id FROM book 
               JOIN category_tag ON category_tag.book_id = book.book_id 
               JOIN category ON category_tag.category_id = category.category_id 
               WHERE category.category_name='$category'";
   $query_run= mysqli_query($conn,$query);
   $check_books=mysqli_num_rows($query_run) > 0;
   
   if ($check_books) {
      while ($row=mysqli_fetch_assoc($query_run)) {
         $book_id = $row['book_id'];
         book_item_card($conn, $book_id);
     }
   } else {
      echo "No book found.";
   }
      $conn->close();
?>

</div>
  