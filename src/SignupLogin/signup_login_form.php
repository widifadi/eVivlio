
<div class="container signup_login" style="margin-top: 100px; margin-bottom: 20px; width: 60%;">
       
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-login-tab" data-toggle="pill" 
                href="#pills-login" role="tab" aria-controls="pills-login"
                aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-signup-tab" data-toggle="pill" 
                href="#pills-signup" role="tab" aria-controls="pills-signup"
                aria-selected="false">Sign Up</a> 
        </li>
    </ul>
<!---->

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" 
            role="tabpanel" aria-labelledby="pills-login-tab">
            <form  action="../src/SignupLogin/verify_login.php" method="post" id="login-form">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Password"  required> 
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" name="login_btn"
                        id="login-btn">Login</button>
                </div>
            </form>
        </div>
        
    

        <div class="tab-pane fade" id="pills-signup" role="tabpanel"
            aria-labelledby="pills-signup-tab">
            <form action="../src/SignupLogin/registration_post.php" method="POST"   id="signup-form">
                <div class="form-group row">
                    <label for="firstName" class="col-sm-3 col-form-label signup-label">First Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstName" name="firstName" 
                        placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastName" class="col-sm-3 col-form-label signup-label">Last Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="lastName" name="lastName" 
                        placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label signup-label">Email Address</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Email address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label signup-label">Username</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label signup-label">Password</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Choose password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-3 col-form-label signup-label">
                        Confirm Password</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="confirmPassword"
                        name="confirmPassword" placeholder="Confirm password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthdate" class="col-sm-3 col-form-label signup-label">Birthdate</label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>
                <!-- TODO make country code selection -->
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label signup-label">Contact Number</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone"
                        name="phone" placeholder="Contact Number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stAddress" class="col-sm-3 col-form-label signup-label">Street Address</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="stAddress" name="stAddress"
                        placeholder="Street Address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label signup-label">City</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="city" name="city"
                        placeholder="City" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state" class="col-sm-3 col-form-label signup-label">State</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="state" name="state" placeholder="State">
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn" type="submit" name="register_btn"
                        id="signup-btn">Register</button>                                 
                </div>
            </form>
        </div>
    </div>
</div>
