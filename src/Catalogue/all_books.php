
<div class="card-columns" id="catalog">

<?php
   require_once("../src/Common/book_card.php");

   $conn = db_connection();
   $query= 'SELECT book_id FROM book';
   $query_run= mysqli_query($conn,$query);
   $check_books=mysqli_num_rows($query_run) > 0;

   if($check_books) {
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
  