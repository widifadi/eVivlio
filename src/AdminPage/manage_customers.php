<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Update</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Username</th> 
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
            ?>
            <tr>
                <td>
                    <!-- TODO enable operations -->
                    <i class="fas fa-user-edit"></i>
                    <i class="fas fa-trash-alt"></i>
                </td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <?php 
                        echo $row['street_address'] . ", " . $row['city'] . ", " . $row['state']; 
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

<!-- TODO popup on update -->