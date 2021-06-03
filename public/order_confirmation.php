<?php
require_once("../templates/header.php"); ?>
<?php
 include("../database/database_functions.php");
 $conn = db_connection();
$user_name = $_SESSION['user'];
   
        ?>
<div class="container " style="margin-top: 100px; margin-bottom: 200px; width: 40%;">
	<form action="order_confirmation.php" method="post" id="login-form">
		
	<?php
	$customer_query = "SELECT * FROM customer_order ";
    $customer_result = mysqli_query($conn, $customer_query);
    $customer_details = mysqli_fetch_assoc($customer_result);

?>

		<p> Thank you for shopping with Us..! </p>

		<p> ORDER DETAILS </p>


		<br> <?php echo   $customer_details['order_id']?> </br>
			<br> </br>
			<br> <?php echo  $customer_details['order_date'] ?> </br>
			<br> </br>
			<tr>	<?php echo 'TODO     PRICE  content'?> </tr>
			<br> </br>
			<tr>	<?php echo $customer_details['customer_id'] ?> </tr>
			<br> </br>
			<tr>	<?php echo 'TODO     Shipping Address'?> </tr>
			<br> </br>
			<tr>	<?php echo 'TODO     Order Date'?> </tr>
			<br> </br>
        
		<p> Please Check your email as well for order details </p>

	</form>
	</div>



	
	
	<?php require_once("../templates/footer.php"); 