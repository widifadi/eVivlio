<?php

    include("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['update-user-btn'])) {
        $user_id = $_POST['user_id'];
        $user_id = mysqli_real_escape_string($conn, $user_id);

        $admin_permission = 0;
        if (isset($_POST['admin_permission'])) {
            $admin_permission = 1;
        }

        $updateuser_query = "UPDATE user 
                        SET admin_permission = '$admin_permission' 
                        WHERE user_id = '$user_id' ";

        if ($conn->query($updateuser_query) === TRUE) {
            echo "User updated successfully. <br>";
        } else {
            echo "User Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

        header("location: ../../public/admin_page.php#manageusers");
    }
      
    mysqli_close($conn);

?>