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

   

    if (isset($_POST['btn_feedback'])) {
        $feedback_name = $_POST['feedback_name'];
        $feedback_name = mysqli_real_escape_string($conn, $feedback_name);

        $feedback_email = $_POST['feedback_email'];
        $feedback_email = mysqli_real_escape_string($conn, $feedback_email);


        $feedback_message = $_POST['feedback_message'];
        $feedback_message = mysqli_real_escape_string($conn, $feedback_message);


        $feedback_query = "INSERT INTO feedback (feedback_name, feedback_email, feedback_message) 
                        VALUES ('$feedback_name', '$feedback_email', '$feedback_message')";
        if ($conn->query($feedback_query) === TRUE) {
            echo "New feedback from. <br>" . $feedback_name;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


        header("location: contact_fb_sbn.php");
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>