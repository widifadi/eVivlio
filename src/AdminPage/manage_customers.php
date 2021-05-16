<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Update</th>
                <th scope="col">Customer ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Contact Num</th>
                <th scope="col">Address</th>
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

                $query = "SELECT * FROM customer"; 
                $result = mysqli_query($conn, $query); 
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $customer_id = $row['customer_id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
            ?>
            <tr>
                <td>
                    <em class="fas fa-user-edit update-customer"
                        id="updatecustomer-<?php echo $customer_id ?>"></em>
                    <em class="fas fa-trash-alt delete-customer"
                        id="deletecustomer-<?php echo $customer_id ?>"
                        first-name='<?php echo $first_name ?>'
                        last-name='<?php echo $last_name ?>'
                        data-toggle="modal" data-target=".delete-customer-modal"></em>
                </td>
                <td><?php echo $customer_id; ?></td>
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['birthday']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <?php 
                        echo $row['address'] . ", " . $row['city'] . ", " . $row['state']; 
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

<!-- Delete Customer Modal -->
<div class="modal fade delete-customer-modal" tabindex="-1" role="dialog" 
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Customer Deletion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Delete <span id="first_name"></span> <span id="last_name"></span>?
            <br>
            The customer's user account will also be deleted.
            <br>
            <br>
            <div class="alert" id="deletecustomer-response" role="alert"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="delete-customer-btn">Delete Customer</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-customer-operations.js"></script>