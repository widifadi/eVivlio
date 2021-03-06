<?php require_once("../templates/header.php"); ?>

<?php
    include("../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['save-order'])) {

        $user_name = $_SESSION['user'];

        $payment_method=$_POST['card_type'];
        $payment_method = mysqli_real_escape_string($conn, $payment_method);

        $card_number=$_POST['card_number'];
        $card_number = mysqli_real_escape_string($conn, $card_number);

        $PID= $_POST['card_PID'];
        $PID = mysqli_real_escape_string($conn, $PID);

        // TODO get date of system
      //  $order_date= $_POST[date("Y-m-d")];
          $order_date= date("Y-m-d");
        //  $order_date = mysqli_real_escape_string($conn, $order_date);

        $customer_name=$_POST['card_owner'];
        $customer_name=mysqli_real_escape_string($conn, $customer_name);

        // GET the customer ID 
        $customer_query = "SELECT * FROM customer 
                            INNER JOIN user 
                            ON customer.customer_id=user.customer_id
                            WHERE username='$user_name'"; 
        $customer_result = mysqli_query($conn, $customer_query);
        $customer_details = mysqli_fetch_assoc($customer_result);
        $customer_ID = $customer_details['customer_id'];

        //INSERT PAYMENT Details into payment table
        $payment_query = "INSERT INTO payment (customer_id, payment_date, payment_method)
                            VALUES  ('$customer_ID', '$order_date', '$payment_method')";
                            
        if ($conn->query($payment_query) === TRUE) {
            echo "Payment details inserted successfully.";
        } else {
            echo "Customer Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

        // insert from Cart to Customer ORder Table only when payment is processed
        $order_query = "SELECT * FROM cart WHERE customer_id= '$customer_ID'"; 
        $result = mysqli_query($conn, $order_query); 
        $index=0;
        while ($row = mysqli_fetch_assoc($result)) {       
            $bookId[$index]    = $row['book_id'];            
            $qty[$index]       = $row['quantity'];
            $totalPrice[$index]= $row['total_price'];
            $index++;
        }

        $shipping= $_SESSION['shipping_address'];
        
        // INSERT int customer ORDER the shipping address which was saved in session
        $custOrder_query= "INSERT INTO customer_order (customer_id, order_date, shipping_status, shipping_address) 
                        VALUES( '$customer_ID', '$order_date', 'Order Received', '$shipping')";
        mysqli_query($conn, $custOrder_query);

        $customerOrder_query = "SELECT order_id FROM customer_order 
                                WHERE customer_id= '$customer_ID' ORDER BY order_id DESC LIMIT 1";                      
        $result = mysqli_query($conn, $customerOrder_query);
        $orderrow = mysqli_fetch_assoc($result);
                        
        $orderid=$orderrow['order_id'];

        for( $i=0; $i<count($bookId); $i++){
            $b=$bookId[$i];
            $q=$qty[$i];
            $p=$totalPrice[$i];
            $itemOrder_query= "INSERT INTO order_items (book_id, order_id, quantity,total_price) 
                            VALUES( '$b','$orderid', '$q', '$p')";
            mysqli_query($conn, $itemOrder_query);

            // decrement book stock
            $book_query = "SELECT * FROM book WHERE book_id=$b";
            $book_query_result = mysqli_query($conn, $book_query);
            $book_row = mysqli_fetch_assoc($book_query_result);
            $new_stock = $book_row['stock'] - $q;

            $decrement_book_stock_query = "UPDATE book SET stock = $new_stock 
                                        WHERE book_id='$b'";
                                    
                    mysqli_query($conn, $decrement_book_stock_query);
        }


        $delete_query= "DELETE FROM cart WHERE customer_id= '$customer_ID'";
        mysqli_query($conn, $delete_query);

        header('location:order_confirmation.php');
    }
?>

<!-- The PAYMENT FORM-->
<div class="container" class="nav nav-pills mb-3 justify-content-center" 
    style="margin-top: 100px; margin-bottom: 100px; margin: left 100px; width:40%;">
    <form class="blue-bg-form" action="payment_process.php" method="post">
        <p style="text-align: center"> 
            <strong>Please enter card details.</strong> 
        <p>
        <div class="form-group row">
            <label for="card_type" class="col-sm-3 col-form-label signup-label">Type</label>
            <div class="col-sm-9">
                <select class="form-control"  name="card_type" required>
                        <option value="VISA">VISA</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="American Express">American Express</option>
                </select>  
            </div>
         </div>
        <div class="form-group row"> 
            <label for="card_number" class="col-sm-3 col-form-label signup-label">Number</label>
             <div class="col-sm-9">
              	<input type="text"  class="form-control" id="card_number" name="card_number" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="card_PID" class="col-sm-3 col-form-label signup-label">PID</label>
            <div class="col-sm-9">
              	<input type="number" class="form-control" id="card_PID" name="card_PID" required>
            </div>
        </div>
   <!--     <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label signup-label">Date</label>
            <div class="col-sm-9">
                <input type="date"  class="form-control" name="date" required>
            </div>
        </div> -->
        <div class="form-group row">
            <label for="card_owner" class="col-sm-3 col-form-label signup-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="card_owner" required>
            </div>
        </div>  
        <div class="text-center">
            <button type="button" class="btn btn-secondary">
                <a href="cart.php">Cancel</a>
            </button>
            <button type="submit" style="align-items:center;" class="btn btn-primary" name="save-order">
                Purchase
            </button>
        </div>
    </form>
</div>

<?php require_once("../templates/footer.php"); ?>