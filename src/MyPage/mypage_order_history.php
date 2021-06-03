<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href="#"> Order History </a> 

</div> 
<div class="col "> 
<div class="table-responsive mt-2">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Content</th> 
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once("../database/database_functions.php");
                $conn = db_connection();
                
                $user_name = $_SESSION['user'];
            
                $query = "SELECT DISTINCT
                b.book_title, oi.quantity, oi.total_price, o.order_id, o.order_date, o.shipping_status, u.username
                FROM order_items oi
                JOIN book b
                USING (book_id)
                JOIN customer_order o
                USING (order_id)
                JOIN customer c
                USING (customer_id)
                JOIN user u
                USING (customer_id) WHERE u.username='$user_name' "; 
                $result = mysqli_query($conn, $query); 
                //$row = mysqli_fetch_assoc($result); 
                while($row = mysqli_fetch_assoc($result)) 
               {
                    $order_id = $row['order_id'];
                    $order_date = $row['order_date'];
                    $order_books = $row['book_title'];
                    $order_number = $row['quantity'];
                    $order_value = $row['total_price'];
                    $order_status = $row['shipping_status'];
                    
            ?>
            <tr>
                <td><?php echo $order_id; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_books .", ". $order_number ." pc"; ?></td>
                <td><?php echo $order_value; ?></td>
                <td><?php echo $order_status; ?></td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<?php
	if (isset($conn)) { 
        mysqli_close($conn);
    }
?>
</div>