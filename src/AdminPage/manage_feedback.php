<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Name</th> 
                <th scope="col">Email Address</th> 
                <th scope="col">Feedback</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                include("../../database/database_functions.php");
                $conn = db_connection();

                $feedback_query = "SELECT * FROM feedback"; 
                $result = mysqli_query($conn, $feedback_query); 
                while($row = mysqli_fetch_assoc($result)) 
                { 
            ?>
            <tr>
                <td><?php echo $row['feedback_id']; ?></td>
                <td><?php echo $row['feedback_name']; ?></td>
                <td><?php echo $row['feedback_email']; ?></td>
                <td><?php echo $row['feedback_message']; ?></td>
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