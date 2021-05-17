<form action="../src/AdminPage/update_user_post.php" method="POST" id="update-user-form" 
    enctype="multipart/form-data">
    <div class="form-group row">
        <label for="user_id" class="col-sm-3 col-form-label updateuser-label">User ID</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-userid" name="user_id" 
            placeholder="User ID" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label updateuser-label">Username</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-username" name="username" 
            placeholder="Username" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="customer_id" class="col-sm-3 col-form-label updateuser-label">Customer ID</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-customerid" name="customer_id" 
            placeholder="Customer ID" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="customer_id" class="col-sm-4 col-form-label updateuser-label">Admin Permission</label>
        <div class="col-sm-8">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="update-permission" name="admin_permission">
            <label class="custom-control-label" for="update-permission">Is Admin?</label>
        </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn blue-theme-btn" type="submit" name="update-user-btn"
            id="update-user-btn">Update User Details</button>                                 
    </div>
</form>

