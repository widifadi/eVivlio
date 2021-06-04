<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <em class="fas fa-chevron-right" style="color: grey;"></em>
    <a href="#"> Personal Details </a> 
</div>

<!---DETAILS TABS---->
<ul class="nav nav-tabs" id="myPageTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active mypage-tab" id="preview-tab" 
            data-toggle="tab" href="#preview" role="tab" 
        aria-controls="preview" aria-selected="true">Preview</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link mypage-tab" id="edits-tab" 
        data-toggle="tab" href="#edit" role="tab" 
        aria-controls="edit" aria-selected="false">Edit</a>
    </li>
</ul>

<!--- DETAILS TABS CONTENT---->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="preview" role="tabpanel" 
        aria-labelledby="preview-tab" style="font-size: 14px; padding: 10px;">
        <!-- PHP database connection -->
        <?php
            require_once ("../database/database_functions.php");
            $conn=db_connection();

            $user_name = $_SESSION['user'];
            
            // select customer table WHERE username = username
            $customer_query = "SELECT * FROM customer 
                                INNER JOIN user 
                                ON customer.customer_id=user.customer_id
                                WHERE username='$user_name'"; 
            $customer_result = mysqli_query($conn, $customer_query);
            $customer_details = mysqli_fetch_assoc($customer_result);

        ?>
        <div class="row mt-3">
            <div class="col-3">
                <h6 class="mb">Full Name</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo $customer_details['first_name'] ." ". $customer_details['last_name'];
                ?>
            </div>
        </div>
        <div class="row"> 
            <div class="col-3">
                <h6 class="mb">Username</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php echo $customer_details['username']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">E-mail</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php echo $customer_details['email']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Date of Birth</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php echo $customer_details['birthday']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Contact Number</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php echo $customer_details['phone']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Shipping Address</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo $customer_details['address'].", ". $customer_details['city'].", ". $customer_details['state'];
                ?>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="edit" role="tabpanel" 
                aria-labelledby="edit-tab" style="padding: 10px;">
        <form action="../src/MyPage/update_customer_post.php" method="POST">
               
            <div class="form-group row">
                <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="first_name" name="first_name" 
                        value="<?php echo $customer_details['first_name']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="last_name" name="last_name" 
                        value="<?php echo $customer_details['last_name']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">E-mail</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="email" name="email" 
                    value="<?php echo $customer_details['email']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-sm-4 col-form-label">Date of Birth</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="birthday" name="birthday" 
                        value="<?php echo $customer_details['birthday']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-4 col-form-label">Contact Number</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="phone" name="phone" 
                        value="<?php echo $customer_details['phone']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Street Address</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="address" name="address" 
                    value="<?php echo $customer_details['address']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-sm-4 col-form-label">City</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="city" name="city" 
                        value="<?php echo $customer_details['city']; ?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="state" class="col-sm-4 col-form-label">State</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="state" name="state" 
                    value="<?php echo $customer_details['state'];?>">
                </div>
            </div>
            
            <div class="mt-5 text-center"><button class="btn  btn-warning" 
                type="submit" name="pd_edit"  id="pd_edit" >Save</button>
            </div>
               
        </form> 
    </div>
</div>

