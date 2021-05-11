<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Update</th>
                <th scope="col">User ID</th>
                <th scope="col">Username</th> 
                <th scope="col">Customer ID</th>
                <th scope="col">Admin Permission</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // TODO do sql connection only once for the whole app
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "eVivlio";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $user_query = "SELECT * FROM user"; 
                $result = mysqli_query($conn, $user_query); 
                while($row = mysqli_fetch_assoc($result)) 
                { 
                    $user_id = $row['user_id'];
                    $user_name = $row['username'];
            ?>
            <tr>
                <td>
                    <em class="fas fa-user-edit"></em>
                    <em class="fas fa-trash-alt delete-user"
                        id="deleteuser-<?php echo $user_id ?>" 
                        username='<?php echo $user_name ?>'
                        data-toggle="modal" data-target=".delete-user-modal"></em>
                </td>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_name; ?></td>
                <td>
                    <?php 
                        $customer_query = "SELECT customer_id FROM customer WHERE username='$user_name' "; 
                        $customer_result = mysqli_query($conn, $customer_query);
                        $customer_data = mysqli_fetch_assoc($customer_result);
                        $customer_id = $customer_data['customer_id'];
                        echo $customer_id;
                    ?>
                </td>
                <td>
                    <!-- TODO use bootstrap badge -->
                    <?php echo $row['admin_permission']; ?>
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
            <div class="alert" id="delete-response" role="alert"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="delete-user-btn">Delete User</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-user-operations.js"></script>