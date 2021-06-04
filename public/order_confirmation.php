<?php
	require_once("../templates/header.php"); ?>

<?php
	include("../database/database_functions.php");
	$conn = db_connection();
	$user_name = $_SESSION['user'];

	$customer_query = "SELECT customer.email, customer.first_name, customer.last_name, customer.customer_id
					    FROM user
						JOIN customer ON customer.customer_id=user.customer_id 
						WHERE username= '$user_name'; ";

	$result= mysqli_query($conn, $customer_query);
	$result = mysqli_fetch_assoc($result);

	$customerID= $result['customer_id']; 
	$CustomerName= $result['first_name'] . " " . $result['last_name'];
	$customerEmail= $result['email']; 

	$order_query= "SELECT customer_order.order_id, customer_order.order_date
				FROM customer_order 
				WHERE customer_id= '$customerID' ORDER BY  order_id DESC LIMIT 1;";

	$OrdeResult= mysqli_query($conn, $order_query);
	$OrdeResult = mysqli_fetch_assoc($OrdeResult );

	$orderID= $OrdeResult['order_id']; 
	$Date= $OrdeResult['order_date'];

	$orderBook= "SELECT * FROM order_items 
				WHERE order_id= '$orderID'";

	$orderBook= mysqli_query($conn, $orderBook);
			
	$qtys = array();
	$prices = array();
	$bookTitles = array();
	$total_sum = 0;
	$index = 0;

	while($orderBooks = mysqli_fetch_assoc($orderBook)) {
		$qtys[$index] 	= $orderBooks['quantity']; 
		$prices[$index] = $orderBooks['total_price'];					
		$orderedBookID	= $orderBooks['book_id'];

		$BookQuery= "SELECT book_title FROM book 
					WHERE book_id= '$orderedBookID'";

		$orderBookitem= mysqli_query($conn, $BookQuery);
		$orderBookitem= mysqli_fetch_assoc(	$orderBookitem);

		$bookTitles[$index]  = $orderBookitem['book_title'];	
		$index++;				 
	}

	// require_once("../public/email.php"); 
?>


<div class="container order-confirmation-div" style="margin-top: 100px; margin-bottom: 200px; width: 50%;"> 
	<p style="text-align:center; color: white;">Thank you for shopping with us!</p>
	<p style="text-align:center; "><strong>ORDER RECEIPT</strong></p>

	<div class="row ml-3" style="color:white">
		<div class="col">Customer Details</div>
	</div>
	<div class="row ml-5" style="color:white">
		<div class="col">
			<strong>Name</strong><br>
			<strong>Order Number</strong> <br>
			<strong>Date</strong> <br>

		</div>
		<div class="col">
			<?php echo $CustomerName; ?>
			<?php echo $orderID; ?>
			<?php echo $Date; ?>

		</div>
		<div class="col text-center">
		</div>
	</div>
	<br>
	<br>
	<div class="row ml-3" style="color:white">
		<div class="col">Book Details</div>
	</div>
	<div class="row text-center" style="color:white">
		<div class="col">
			<strong>Book Title</strong>
		</div>
		<div class="col">
			<strong>Quantity</strong>
		</div>
		<div class="col">
			<strong>Price</strong>
		</div>
	</div>
	<?php 
		for ($p=0; $p<count($qtys); $p++) {
			echo $bookTitles[0];
	?>
		<div class="row text-center">
			<div class="col"><?php echo $bookTitles[$p];?></div>
			<div class="col"><?php echo $qtys[$p];?></div>
			<div class="col"><?php echo $prices[$p];?></div>
		</div>
	<?php
			$total_sum += $prices[$p];
		}
	?>

	<br>
	<br>
	<div class="row text-center">
		<div class="col">
			<strong>Total Price: </strong>
			<?php echo $total_sum ?>
		</div>
	</div>

	<br>
	<br>
	<div style="text-align:center"	>
		<button class="btn btn-info" onClick="window.print()">Print Receipt</button>
	</div>

	&nbsp;&nbsp;
	<p style="text-align: center">
		Please check your email as well for order details.
	</p>
</div>

<?php require_once("../templates/footer.php"); ?>