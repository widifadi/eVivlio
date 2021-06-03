<?php 
require_once("../templates/header.php");

$user_name = $_SESSION['user'];
            
            // TODO select customer table WHERE username = username
            $customer_query = "SELECT * FROM customer 
            INNER JOIN user 
            ON customer.customer_id=user.customer_id
             WHERE username='$user_name'"; 
            $customer_result = mysqli_query($conn, $customer_query);
            $customer_details = mysqli_fetch_assoc($customer_result);
            
        ?>


<div class="container " style="margin-top: 0px; margin-bottom: 200px; width: 100%;">
<p> <b> Enter your shipping details </b> </p>
<form action="../src/AdminPage/customer_shipping_post.php" method="POST" id="login-form">

<div class="form-group row">
        <label for="firstName" class="col-sm-3 col-form-label signup-label">Customer ID</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-firstName" name="firstName"  placeholder="First Name"  
        readonly
                  
            value="<?php echo     $customer_details['customer_id'];?>"
                            
                               
            >                
        </div>
    </div>
      
    <div class="form-group row">
        <label for="firstName" class="col-sm-3 col-form-label signup-label">First Name</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-firstName" name="firstName"  placeholder="First Name"  
        readonly
                  
            value="<?php echo     $customer_details['first_name'];?>"
                            
                               
            >                
        </div>
    </div>
    <div class="form-group row">
        <label for="lastName" class="col-sm-3 col-form-label signup-label">Last Name</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-lastName" name="lastName" 
            placeholder="Last Name" readonly
            value="<?php echo     $customer_details['last_name'];  ?>"
                               
                            
            > 
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
        <button class="btn yellow-theme-btn" type="submit" name="save-customer-shipping-btn"
            id="save-customer-shipping-btn">Save Details and start Payment</button>                                 
    </div>
    </form>
</div>