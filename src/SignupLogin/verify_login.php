<?php

    require_once("../../database/database_functions.php");
    $conn = db_connection();

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

            header("location: ../../public/index.php");
            exit();

        } else {
            echo "User not found.";
            // TODO pass login error to login page
        }
    } 

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>
