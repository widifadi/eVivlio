<?php 
    // TODO do sql connection only once for the whole app
    require_once("../../database/database_functions.php");
    $conn = db_connection();

    // Get POST data from AJAX
    $book_id = $_POST['book_id'];

    $delete_bestseller = "DELETE FROM best_seller WHERE book_id=$book_id;";
    $delete_newrelease = "DELETE FROM new_release WHERE book_id=$book_id;";
    $delete_editorspick = "DELETE FROM editors_pick WHERE book_id=$book_id;";
    $delete_book = "DELETE FROM book WHERE book_id=$book_id;";

    mysqli_query($conn, $delete_newrelease);
    mysqli_query($conn, $delete_bestseller);
    mysqli_query($conn, $delete_editorspick);

    if (mysqli_query($conn, $delete_book)) {
        echo "0";
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
      
    mysqli_close($conn);

?>