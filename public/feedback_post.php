<?php require_once("../templates/header.php"); ?>
<?php 
    // TODO do sql connection only once for the whole app
    // TODO use database_functions file
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "evivlio";

    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
   /* if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    if (isset($_POST['btn_feedback'])) {
 

        $user_name = $_SESSION['user'];
        $feedback = $_POST['feedback'];
        $feedback = mysqli_real_escape_string($conn, $feedback);
        $userid_query = "SELECT * FROM user WHERE username='$user_name'"; 
        $userid_result = mysqli_query($conn, $userid_query);
        $user_id = mysqli_fetch_assoc($userid_result);
        $userid = $user_id['user_id'];


        $feedback_query = "INSERT INTO feedback (user_id, feedback)
                        VALUES ('$userid', '$feedback')";
       if ($conn->query($feedback_query) === TRUE) {
            echo "New customer created successfully. <br>" . $feedback;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


       header("location: contact_fb_sbn.php");
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>