<?php
    require_once("../database/database_functions.php");
    
    $featureBook_id=[];
    $featureBookCover=[];
    $featureBookTitle=[];

   function feature($feature_name){
    $conn = db_connection();
    $featureQuery= "SELECT book.book_id, book.book_cover, book.book_title FROM book 
             JOIN feature_tag ON feature_tag.book_id=book.book_id
             JOIN book_feature ON book_feature.feature_id=feature_tag.feature_id
             WHERE feature_name='$feature_name'";
     $feature_query_run=mysqli_query($conn,$featureQuery);
     $check_feature_query=mysqli_num_rows($feature_query_run) > 0;
     if($check_feature_query){
         $index=0;
      while($featureRow=mysqli_fetch_assoc($feature_query_run))   {
        $featureBook_id[$index]=$featureRow['book_id'];
        $featureBookCover[$index]=$featureRow['book_cover'];
        $featureBookTitle[$index]=$featureRow['book_title'];
        $index++;

      }

     }   
     else{
        echo "no book found";
     }     
$conn->close();
return array($featureBook_id,$featureBookCover,$featureBookTitle);

    }
    ?>