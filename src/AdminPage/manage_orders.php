<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Order ID</th>
                <!-- TODO customer name? -->
                <th scope="col">Customer ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Shipping Status</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                // include("../../database/database_functions.php");
                // $conn = db_connection();

                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "evivlio";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $order_query = "SELECT * FROM order"; 
                $result = mysqli_query($conn, $order_query); 
                while($row = mysqli_fetch_assoc($result)) 
                { 
            ?>
            <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
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