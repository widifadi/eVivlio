<div class="table-responsive">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Username</th> 
                <th scope="col">Customer ID</th>
                <th scope="col">Admin Permission</th>
                <th scope="col">Update/Delete</th>
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
            ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $user_name = $row['username']; ?></td>
                <td>
                    <?php 
                        $customer_query = "SELECT customer_id FROM customer WHERE username='$user_name' "; 
                        $customer_result = mysqli_query($conn, $customer_query);
                        $customer_data = mysqli_fetch_assoc($customer_result);
                        $customer_id = $customer_data['customer_id'];
                        echo $customer_id;
                    ?>
                </td>
                <td><?php echo $row['admin_permission']; ?></td>
                <td>
                    <!-- TODO enable operations -->
                    <i class="fas fa-user-edit"></i>
                    <i class="fas fa-user-slash"></i>
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

<!-- TODO popup on update -->