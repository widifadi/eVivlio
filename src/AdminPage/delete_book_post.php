<?php 
    require_once("../../database/database_functions.php");
    $conn = db_connection();

    // Get POST data from AJAX
    $book_id = $_POST['book_id'];

    $delete_author_tag = "DELETE FROM author_tag WHERE book_id=$book_id;";
    $delete_category_tag = "DELETE FROM category_tag WHERE book_id=$book_id;";
    $delete_feature_tag = "DELETE FROM feature_tag WHERE book_id=$book_id;";
    $delete_wishlist = "DELETE FROM wishlist WHERE book_id=$book_id;";
    $delete_order_items = "DELETE FROM order_items WHERE book_id=$book_id;";
    $delete_book_review = "DELETE FROM book_review WHERE book_id=$book_id;";
    $delete_cart = "DELETE FROM cart WHERE book_id=$book_id;";

    $delete_book = "DELETE FROM book WHERE book_id=$book_id;";

    mysqli_query($conn, $delete_author_tag);
    mysqli_query($conn, $delete_category_tag);
    mysqli_query($conn, $delete_feature_tag);
    mysqli_query($conn, $delete_wishlist);
    mysqli_query($conn, $delete_order_items);
    mysqli_query($conn, $delete_book_review);
    mysqli_query($conn, $delete_cart);

    if (mysqli_query($conn, $delete_book)) {
        echo "0";
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
      
    mysqli_close($conn);

?>