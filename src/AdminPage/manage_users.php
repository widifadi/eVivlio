<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Update</th>
                <th scope="col">User ID</th>
                <th scope="col">Username</th> 
                <th scope="col">Customer ID</th>
                <th scope="col">Permission</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $conn = db_connection();

                $user_query = "SELECT * FROM user"; 
                $result = mysqli_query($conn, $user_query); 
                while($row = mysqli_fetch_assoc($result)) 
                { 
                    $user_id = $row['user_id'];
                    $user_name = $row['username'];
                    $customer_id = $row['customer_id'];
                    $admin_permission = $row['admin_permission']
            ?>
            <tr>
                <td>
                    <!-- TODO might not be a good idea to pass all these as attr for security -->
                    <em class="fas fa-user-edit update-user"
                        id="updateuser-<?php echo $user_id ?>" 
                        username='<?php echo $user_name ?>'
                        customer-id='<?php echo $customer_id ?>'
                        admin-permission='<?php echo $admin_permission ?>'
                        data-toggle="modal" data-target=".update-user-modal"></em>
                    <em class="fas fa-trash-alt delete-user"
                        id="deleteuser-<?php echo $user_id ?>" 
                        username='<?php echo $user_name ?>'
                        customer-id='<?php echo $customer_id ?>'
                        data-toggle="modal" data-target=".delete-user-modal"></em>
                </td>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_name; ?></td>
                <td>
                    <?php 
                        echo $customer_id;
                    ?>
                </td>
                <td>
                    <?php 
                        if ($admin_permission == 1) {
                    ?>
                        <span class="badge badge-success">Admin</span>
                    <?php 
                        }
                    ?>
                </td>
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

<!-- Delete User Modal -->
<div class="modal fade delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm User Deletion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Delete <span id="username"></span>? Deleting user will also delete customer data.
            <br>
            <br>
            <div class="alert" id="deleteuser-response" role="alert"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="delete-user-btn">Delete User</button>
        </div>
        </div>
    </div>
</div>

<!-- Update User Modal -->
<div class="modal fade update-user-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php include("update_user_form.php") ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-user-operations.js"></script>