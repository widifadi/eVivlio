<?php
    // This file is used for storing data coming from client to db
    require "../../database/database_functions.php";
    $conn = db_connection();

    if(isset($_POST['bookId'])){
        $pid = $_POST['bookId'];
        $pcustomer = 1;
        $pqty = 1;

        $sql = "SELECT price FROM book WHERE book_id=$pid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $pprice = $row['price'];
            }
        } else {
            echo "0 result";
        }

        $stmt = $conn->prepare("SELECT book_id FROM cart WHERE book_id=?");
        $stmt->bind_param("i",$pid);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $bookid = $r['book_id']; // error fetch as null array 

        // This is the part to show notification if the book is added or already added to the cart
        if(!$bookid){
            $sql = $conn->prepare("INSERT INTO cart (book_id,customer_id,quantity,total_price) 
                                    VALUE (?,?,?,?)");
            $sql->bind_param("i,i,i,d",$pid,$pcustomer,$pqty,$pprice);
            $sql->execute();

            // Bootsrap alert
            echo'<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Book added to your cart!</strong>
                </div>';
        } 
        else{

            // Bootstrap alert
            echo'<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Book already added to your cart!</strong>
                </div>';
        }
    }
?>
