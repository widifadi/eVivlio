<?php
require_once("../templates/header.php"); ?>
<div class="container " style="margin-top: 100px; margin-bottom: 100px; width: 50%;">
	<p> <b> Please Proceed to Payment </b> <p>
        <form action="order_confirmation.php" method="post" id="login-form">
        <div class="form-group">
                <label for="card_type" class="col-lg-2 control-label">Type</label>
                <div class="col-lg-10">
                    <select class="form-control" name="card_type">
                        <option value="VISA">VISA</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="American Express">American Express</option>
                    </select>   
                </div>
            <div    class="form-group"> 
            <label for="card_number" class="col-lg-2 control-label">Number</label>
            <div class="col-lg-10">
              	<input type="text"  class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">PID</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
            </div>
        </div>
        </div>
            </div>
		</div>
    </form>
    <?php require_once("../templates/footer.php"); 