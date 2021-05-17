<form action="../src/AdminPage/update_customer_post.php" method="POST">
    <div class="form-group row">
        <label for="customerID" class="col-sm-3 col-form-label signup-label">Customer ID</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-customer-id" name="customer-id" 
            placeholder="0" readonly>
        </div>
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
    <div class="form-group row">
        <label for="birthdate" class="col-sm-3 col-form-label signup-label">Birthdate</label>
        <div class="col-sm-9">
        <input type="date" class="form-control" id="update-birthdate" name="birthdate" required>
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
        <button class="btn blue-theme-btn" type="submit" name="update-customer-btn"
            id="update-customer-btn">Update Customer Details</button>                                 
    </div>
</form>