<div class="container catalog-breadcrumbs">
    <a href="my_page.php"> My Page </a> 
    <i class="fas fa-chevron-right" style="color: grey;"></i>
    <a href=""> Order History </a> 

</div> 
<div class="col "> 
<div class="table-responsive mt-2">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Content</th> 
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // TODO do sql connection only once for the whole app
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "eVivlio";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $user_name = $_SESSION['user'];
            
                $query = "SELECT * FROM orders WHERE username='$user_name' "; 
                $result = mysqli_query($conn, $query); 
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $order_id = $row['order_id'];
                    $order_date = $row['order_date'];
                    $order_content = $row['order_content'];
                    $order_value = $row['order_value'];
                    $order_status = $row['order_status'];
                    
            ?>
            <tr>
                <!--<td>
                    <em class="fas fa-user-edit"></em>
                    <em class="fas fa-trash-alt delete-customer"
                        id="deletecustomer-<?php echo $customer_id ?>"
                        username='<?php echo $user_name ?>'
                        first-name='<?php echo $first_name ?>'
                        last-name='<?php echo $last_name ?>'
                        data-toggle="modal" data-target=".delete-customer-modal"></em>
                </td>-->
                <td><?php echo $order_id; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_content; ?></td>
                <td><?php echo $order_value; ?></td>
                <td><?php echo $order_status; ?></td>

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
</div>