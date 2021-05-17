<form action="../src/AdminPage/update_order_post.php" method="POST">
    <div class="form-group row">
        <label for="order_id" class="col-sm-3 col-form-label updateorder-label">Order ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="update-orderid" name="order_id" 
                placeholder="Order ID" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="customer_id" class="col-sm-3 col-form-label updateorder-label">Customer ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="update-ordercustomer" name="customer_id" 
                placeholder="Customer ID" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="order_date" class="col-sm-3 col-form-label updateorder-label">Order Date</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="update-orderdate" name="order_date" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="shipping_status" class="col-sm-3 col-form-label updateorder-label">
            Shipping Status</label>
        <div class="col-sm-9">
            <select class="form-control" id="update-shipping" name="shipping_status">
                <option value="orderReceived">Order Received</option>
                <option value="inDepot">In Depot</option>
                <option value="packing">Packing</option>
                <option value="inTransit">In Transit</option>
                <option value="forDelivery">Out for Delivery</option>
                <option value="delivered">Delivered</option>
            </select>
        </div>
    </div>

    <div class="text-center">
        <button class="btn blue-theme-btn" type="submit" name="update-order-btn"
            id="update-order-btn">Update Order Details</button>                                 
    </div>
</form>

