<?php
require_once("../templates/header.php"); ?>

<div class="container " style="margin-top: 100px; margin-bottom: -100px; width: 100%;">

		<p> Proceed to checkout </p>
    <div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Order ID</th>
               
                <th scope="col">Book Title</th>               
                <th scope="col">Quantity</th>
                <th scope="col">item price</th> 
                <th scope="col">Total Price</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                require_once("../database/database_functions.php");
                $conn = db_connection();

                $order_query = "SELECT * FROM cart"; 
                $result = mysqli_query($conn, $order_query); 

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $order_id = $row['cart_id'];
            ?>
            <tr>
                <td>
                        <?php echo $order_id ?>
                   
                </td>
                <td><?php echo $order_id; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
            </tr> 
            <?php
                }
            ?>
        </tbody>
    </table>
</div>





















    <div class="col-lg-10 col-lg-offset-2">
              	<button type="submit" class="btn btn-primary">Confirm Details</button>
            </div>
	</div>
	<div class="container " style="margin-top: 200px; margin-bottom: 100px; width: 40%;">
	<p> <b> Please Proceed to Payment </b> <p>
        <form action="order_confirmation.php" method="post" id="login-form">
        <div class="form-group">
                <label for="card_type" class="col-lg-2 control-label">Type</label>
                <div class="col-lg-10">
                    <select class="form-control" name="card_type">
                        <option value="VISA">VISA</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="American Express">American Express</option>
                    </select>   
                </div>
            <div    class="form-group"> 
            <label for="card_number" class="col-lg-2 control-label">Number</label>
            <div class="col-lg-10">
              	<input type="text"  class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">PID</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
            </div>
        </div>
        </div>
            </div>
		</div>
    </form>

	
	
	<?php require_once("../templates/footer.php"); 