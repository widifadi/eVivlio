<?php 
    require_once("../templates/header.php");
    require_once("../database/database_functions.php");
    $conn = db_connection();

    $user_name = $_SESSION['user'];
    $customer_query = "SELECT * FROM customer 
                        INNER JOIN user 
                        ON customer.customer_id=user.customer_id
                        WHERE username='$user_name'"; 
    $customer_result = mysqli_query($conn, $customer_query);
    $customer_details = mysqli_fetch_assoc($customer_result);
?>

<div class="container " style="margin-top: 0px; margin-bottom: 200px; width: 70%;">
    <form class="blue-bg-form" action="../src/AdminPage/customer_shipping_post.php" method="POST">
        <p style="text-align: center"><strong> Enter your shipping details </strong></p>
        <div class="form-group row">
            <label for="firstName" class="col-sm-3 col-form-label signup-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="firstName" 
                    placeholder="First Name" readonly value="<?php echo $customer_details['first_name'];?>" >                
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-3 col-form-label signup-label">Last Name</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="lastName" 
                placeholder="Last Name" readonly value="<?php echo $customer_details['last_name'];  ?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label signup-label">Email </label>
            <div class="col-sm-9">
                <input type="email" class="form-control" name="email" placeholder="Email address">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label signup-label">Contact Number</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="phone" placeholder="Contact Number" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="stAddress" class="col-sm-3 col-form-label signup-label">Shipping Address</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="shipAddress" 
                placeholder="Complete Shipping Address" required>
            </div>
        </div>
        <div class="text-center">
            <button class="btn yellow-theme-btn" type="submit" name="save-customer-shipping-btn"
                id="save-customer-shipping-btn">
                Save Details and Start Payment
            </button>
        </div>
    </form>
</div>