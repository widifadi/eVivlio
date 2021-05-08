<?php 
    // TODO do sql connection only once for the whole app
    // TODO use database_functions file
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

    if (isset($_POST['login_btn'])) {
        $username       =   $_POST['username'];
        $password       =   $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $hash_password = md5($password); 

        // TODO query the password and compare
        $password_query = "SELECT * FROM user WHERE username='$username' AND password='$hash_password' ";
        $result = mysqli_query($conn, $password_query);

        if (mysqli_num_rows($result)) {
            echo "Login successful.";
        } else {
            echo "User not found.";
            // TODO pass login error to login page
        }

        // TODO query the permission

        // $_SESSION['success'] = "Congratulations! You have successfully logged in.";

        $_SESSION['user'] = $username;
        $_SESSION['admin_permission'] = $admin_permission;

        echo $_SESSION['user'];
        // TODO store user in session
        header("location: index.php");

        // TODO if user is not null, show appropriate buttons on header
    } 
?>
