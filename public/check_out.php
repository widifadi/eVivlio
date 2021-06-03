<?php
require_once("../templates/header.php"); 

if (isset($_SESSION['user'])|| $_SESSION['admin_permission'] == 0)
    {?>

     <!--   <div class="container " style="margin-top: 100px; margin-bottom: -100px; width: 60%;">

		<p> <b> Please check the order details </b></p>
 
        <div class="tab-content" id="managebook-content" style="border: solid 1px #F2F2F2;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Item ID</th>
                                <th scope="col">Book Title</th>  
                                <th scope="col">Quantity</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Total Price</th>
                                                             
                        </tr>
                    </thead>
                    <tbody>
                </div>      
            </div> -->
            <?php
    }
                require_once("../database/database_functions.php");
                $conn = db_connection();
                $user_name=$_SESSION['user'];

                $order_query = "SELECT * FROM cart
                 INNER JOIN user ON cart.customer_id= user.customer_id  
                 INNER JOIN book ON cart.cart_id=book.book_id 
                 WHERE username= '$user_name'
                "; 
                $result = mysqli_query($conn, $order_query); 

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $order_id = $row['cart_id'];
            ?>
            <tr>
                <td>
                        <?php echo $order_id ?>            
                </td>
                <td><?php echo $row['book_title']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['quantity'] * $row['total_price']; ?></td>
            </tr> 
        </tbody>
             

        <?php } ?> 
            </table>
         
        </div>   
         
     
<div class="text-right">
        <button class="btn blue-theme-btn" type="submit" name="save-order"
            id="update-customer-btn">Save Order</button>                                 
    </div>
    </div>
<!-- The Customer Shipment Details Start from here ! -->


<div class="container " style="margin-top: 100px; margin-bottom: -100px; width: 60%;">
    <?php 
include('../src/AdminPage/customer_shipping_details.php');?>
</div>	
</div>


<?php require_once("../templates/footer.php"); ?>