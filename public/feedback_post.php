<?php 
    // TODO do sql connection only once for the whole app
    // TODO use database_functions file
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eVivlio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
   /* if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    if (isset($_POST['btn_feedback'])) {
        $feedback_name = $_POST['feedback_name'];
        $feedback_name = mysqli_real_escape_string($conn, $feedback_name);

        $feedback_email = $_POST['feedback_email'];
        $feedback_email = mysqli_real_escape_string($conn, $feedback_email);


        $feedback_message = $_POST['feedback_text'];
        $feedback_message = mysqli_real_escape_string($conn, $feedback_message);


        $feedback_query = "INSERT INTO feedback (feedback_name, feedback_email, feedback_message) 
                        VALUES ('$feedback_name', '$feedback_email', '$feedback_message')";
       if ($conn->query($feedback_query) === TRUE) {
            echo "New customer created successfully. <br>" . $feedback_name;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        header("location: contact_fb_sbn.php");
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>