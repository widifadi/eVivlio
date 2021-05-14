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