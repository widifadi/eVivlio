<?php 
    // TODO do sql connection only once for the whole app
    // TODO use database_functions file
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eVivlio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['login_btn'])) {
        $username       =   $_POST['username'];
        $password       =   $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $hash_password = md5($password); 

        $password_query = "SELECT * FROM user 
                            WHERE username = '$username' AND password = '$hash_password' ";
        $result = mysqli_query($conn, $password_query);

        if (mysqli_num_rows($result)) {
            echo "Login successful.";

            session_start();
            // Unset all of the session variables.
            $_SESSION = array();
            // Save user session
            $_SESSION['user'] = $username;

            // get the permission
            $user_row = mysqli_fetch_array($result);
            $admin_permission = $user_row['admin_permission'];
            $_SESSION['admin_permission'] = $admin_permission;

            header("location: index.php");
            exit();

        } else {
            echo "User not found.";
            // TODO pass login error to login page
        }
    } 

    // TODO close conn
?>
