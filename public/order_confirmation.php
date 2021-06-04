<?php require_once("../templates/header.php"); ?>

<?php
 	require_once("../database/database_functions.php");
  	$conn = db_connection();

	$user_name = $_SESSION['user'];
	$customer_query = "SELECT customer.email, customer.first_name, customer.last_name, customer.customer_id
					    FROM user JOIN customer ON customer.customer_id=user.customer_id 
						WHERE username= '$user_name'";

	$result= mysqli_query($conn, $customer_query);
	$result = mysqli_fetch_assoc($result);

	$customerID = $result['customer_id']; 
	$CustomerName = $result['first_name']." ". $result['last_name'];
	$customerEmail = $result['email']; 
				
	$order_query= "SELECT customer_order.order_id, customer_order.order_date
					FROM customer_order WHERE customer_id= '$customerID' 
					ORDER BY  order_id DESC LIMIT 1";

	$OrdeResult= mysqli_query($conn, $order_query);
	$OrdeResult = mysqli_fetch_assoc($OrdeResult );

	$orderID= $OrdeResult['order_id']; 
	$Date= $OrdeResult['order_date'];

	$orderBook= "SELECT * FROM order_items WHERE order_id= '$orderID'";

	$orderBook= mysqli_query($conn, $orderBook);
				
	$qtys[]= array();
	$prices[]= array();
	$bookTitles[]= array();
		
	$totalSUM=0;
	$index=0;

	while ($orderBooks = mysqli_fetch_assoc($orderBook)) {
		
		$qtys[$index] = $orderBooks['quantity']; 
		$prices[$index] = $orderBooks['total_price'];					
		$orderedBookID = $orderBooks['book_id'];

		$BookQuery= "SELECT book_title , stock FROM book 
					 WHERE book_id= '$orderedBookID'";

		$orderBookitem= mysqli_query($conn, $BookQuery);
		$orderBookitem= mysqli_fetch_assoc(	$orderBookitem);

		$bookTitles[$index]  = $orderBookitem['book_title'];	
		$index++;				 
	}

//	require_once("../public/email.php"); 
			
?>

<div class="container order-confirmation-div" style="margin-top: 100px; margin-bottom: 200px; width: 50%;"> 
	<p style="text-align: center"> <b> Thank you for shopping with us! </b> </p>
	<br>
	<p style="text-align: center"> <b> ORDER RECEIPT </b> </p>

	<div class="row ml-3">Customer Details</div>
	<div class="row ml-5" style="color:white">
		<div class="col-4">
			<strong>Name</strong><br>
			<strong>Order Number</strong> <br>
			<strong>Date</strong> <br>
		</div>
		<div class="col-8">
			<?php echo $CustomerName; ?><br>
			<?php echo $orderID; ?><br>
			<?php echo $Date; ?><br>
		</div>
	</div>
	
	<br>
	<div class="row ml-3">Ordered Book Details</div>
	<table style="color:white; margin: 5px;">
		<tr style="padding-bottom: 2em" class="text-center">
			<th>Book Title</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		<?php 
			for ($p=0; $p<count($qtys); $p++) {
		?>
		<tr style="padding-bottom: 2em">
			<td><?php echo $bookTitles[$p];?></td>
			<td class="text-center"><?php echo $qtys[$p];?> </td>
			<td class="text-center"><?php echo $prices[$p];?></td>									
		</tr>
		<?php
				$totalSUM+=$prices[$p]; 
			}
		?>
		<tr class="text-center">
			<td style="float:right"><strong>Total Price</strong></td>
			<td></td>
			<td><?php echo $totalSUM?></td> 
		</tr>		
	</table>

	<div style="text-align:center">
		<button class="btn btn-info mt-4" onClick="window.print()">Print Receipt</button>
	</div>		
				
	<br>
	<p style="text-align: center"> Please check your email as well for order details.</p>

</div>
				
<?php require_once("../templates/footer.php"); ?>			 