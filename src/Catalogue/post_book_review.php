<?php 
    require_once("../../database/database_functions.php");
    session_start();
    $conn=db_connection();
    $bookid=$_GET['bookid'];
    $bookid=mysqli_real_escape_string($conn,$bookid);
    $bookReview=mysqli_real_escape_string($conn,$_POST['review']);
    $bookRating=mysqli_real_escape_string($conn,$_POST['rating']);

    if(isset($_POST['submit-review-btn'])){
        if(isset($_SESSION['user'])){
            $userName=$_SESSION['user'];
            $customerIdQuery="SELECT customer_id FROM user WHERE username='$userName'";
            $customerIdQuery_run=mysqli_query($conn,$customerIdQuery);
            $customerIdQuery_row=mysqli_fetch_assoc($customerIdQuery_run);
            $customerId=$customerIdQuery_row['customer_id'];
            $customerId=mysqli_real_escape_string($conn,$customerId);
            $insertReviewQuery="INSERT INTO book_review (book_id, customer_id, rating, content)
                    VALUES ('$bookid', '$customerId', '$bookRating', '$bookReview') ";

        } else{
        /* Anonymous user..*/
        $insertReviewQuery="INSERT INTO book_review (book_id, rating, content)
        VALUES ('$bookid','$bookRating', '$bookReview')";
    }

    mysqli_query($conn,$insertReviewQuery);

    }

    mysqli_close($conn);

    header("location: ../../public/book_details.php?bookid=$bookid#reviews");

?>