<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href=""> Personal Details </a> 
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

        /*
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "eVivlio";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } */

            // TODO get username from session
            $user_name = $_SESSION['user'];
            
            // TODO select customer table WHERE username = username
            $customer_query = "SELECT * FROM customer INNER JOIN user ON customer.customer_id=user.customer_id WHERE username='$user_name'"; 
            $customer_result = mysqli_query($conn, $customer_query);
            $customer_details = mysqli_fetch_assoc($customer_result);
            
            

        ?>
        <div class="row mt-3">
            <div class="col-3">
                <h6 class="mb">Full Name</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['first_name'] ." ". $customer_details['last_name'];
                ?>
                    
            </div>
        </div>
        <div class="row"> 
            <div class="col-3">
                <h6 class="mb">Username</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['username'];
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">E-mail</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['email'];
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Date of birth</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['birthday'];
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Contact Number</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['phone'];
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="mb">Shipping Address</h6>
            </div>
            <div class="col-8 text-secondary">
                <?php 
                    echo  $customer_details['address'].", ". $customer_details['city'].", ". $customer_details['state'];
                ?>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="edit" role="tabpanel" 
                aria-labelledby="edit-tab" style="padding: 10px;">
         <form action="update_customer_post.php" method="POST">
            <div class="row">
                <div class="col">
                    
                    
                    <div class="row">
                        <div class="col"><label class="labels">Fisrt Name</label><input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value=""></div>
                        <div class="col"><label class="labels">Last Name</label><input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="Last name"></div>
                    </div>
                    <div class="row">
                    <div class="col"><label class="labels">Username</label><input type="text" class="form-control" placeholder="Username" value=""></div>
                        <div class="col"><label class="labels">E-mail</label><input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value=""></div>
                        <div class="col"><label class="labels">Date of birth</label><input type="text" class="form-control" placeholder="Date of birth" value=""></div>
                        <div class="col"><label class="labels">Contact Number</label><input type="text" class="form-control" name="phone" id="phone" placeholder="Contact number" value=""></div>
                        
                    </div>
                
                    <div class="mt-5 text-center"><button class="btn  btn-outline-warning" type="button" name="pd_edit"  id="pd_edit">Save</button></div>
                
                </div>

            </div>
        </form> 
    </div>
</div>

