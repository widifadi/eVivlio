<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Update</th>
                <th scope="col">Order ID</th>
                <!-- TODO customer name? -->
                <th scope="col">Customer ID</th>
                <!-- TODO change date to date&time? -->
                <th scope="col">Order Date</th>
                <th scope="col">Shipping Status</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                require_once("../database/database_functions.php");
                $conn = db_connection();

                $order_query = "SELECT * FROM customer_order"; 
                $result = mysqli_query($conn, $order_query); 

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $order_id = $row['order_id'];
            ?>
            <tr>
                <td>
                    <em class="fas fa-edit update-order" 
                        id="updateorder-<?php echo $order_id ?>"
                        data-toggle="modal" data-target=".update-order-modal"></em>
                    <em class="fas fa-trash-alt delete-order"
                        id="deleteorder-<?php echo $order_id ?>" 
                        data-toggle="modal" data-target=".delete-order-modal"></em>
                </td>
                <td><?php echo $order_id; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['shipping_status']; ?></td>
            </tr> 
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<?php
	if (isset($conn)) { 
        mysqli_close($conn);
    }
?>

<!-- Delete Order Modal -->
<div class="modal fade delete-order-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Order Deletion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Delete Order #<span id="order-number"></span>?
            <br>
            <br>
            <div class="alert delete-order-response" role="alert" style="display:none;"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="delete-order-btn">Delete Order</button>
        </div>
        </div>
    </div>
</div>

<!-- Update Order Modal -->
<div class="modal fade update-order-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Order Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php include("update_order_form.php") ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-order-operations.js"></script>