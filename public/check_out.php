<?php
require_once("../templates/header.php"); ?>

<div class="container " style="margin-top: 100px; margin-bottom: -100px; width: 60%;">

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
            </div>
            <?php
                
                require_once("../database/database_functions.php");
                $conn = db_connection();

                $order_query = "SELECT * FROM cart INNER JOIN book ON cart.cart_id=book.book_id"; 
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
                <td><?php echo "$" . 2 * $row['total_price']; ?></td>
            </tr> 
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<div class="text-right">
        <button class="btn blue-theme-btn" type="submit" name="update-customer-btn"
            id="update-customer-btn">Save Order</button>                                 
    </div>
    </div>

<!-- The Customer Shipment Details Start from here ! -->

    <div class="container " style="margin-top: 70px; margin-bottom: 100px; width: 70%;">
    <form action="payment_process.php" method="POST">
    <div class="text-center">
        <p> <b> Fill your shipping details </b></p>                                 
    </div>
    <div class="form-group row">
        <label for="firstName" class="col-sm-3 col-form-label signup-label">First Name</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-firstName" name="firstName" 
            placeholder="First Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="lastName" class="col-sm-3 col-form-label signup-label">Last Name</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-lastName" name="lastName" 
            placeholder="Last Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label signup-label">Email Address</label>
        <div class="col-sm-9">
        <input type="email" class="form-control" id="update-email" name="email"
            placeholder="Email address">
        </div>
    </div>
    <!-- TODO make country code selection -->
    <div class="form-group row">
        <label for="phone" class="col-sm-3 col-form-label signup-label">Contact Number</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-phone"
            name="phone" placeholder="Contact Number" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="stAddress" class="col-sm-3 col-form-label signup-label">Street Address</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-address" name="stAddress"
            placeholder="Street Address" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="city" class="col-sm-3 col-form-label signup-label">City</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-city" name="city"
            placeholder="City" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="state" class="col-sm-3 col-form-label signup-label">State</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-state" name="state" placeholder="State">
        </div>
    </div>
    <div class="text-center">
        <button <a href="payment_process.php" class="btn blue-theme-btn" type="submit" name="update-customer-btn"
            id="update-customer-btn">Save and Proceed to Payment </a></button>                                 
    </div>
</form>

</div>	
</div>
	
<?php require_once("../templates/footer.php"); 