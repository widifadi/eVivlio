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
        $first_name = $_POST['feedback_fname'];
        $first_name = mysqli_real_escape_string($conn, $first_name);

        $last_name = $_POST['feedback_lname'];
        $last_name = mysqli_real_escape_string($conn, $last_name);

        $email = $_POST['feedback_email'];
        $email = mysqli_real_escape_string($conn, $email);


        $feedback = $_POST['feedback_text'];
        $feedback = mysqli_real_escape_string($conn, $feedback);


        $feedback_query = "INSERT INTO feedback (first_name, last_name, email, feedback) 
                        VALUES ('$first_name', '$last_name', '$email', '$feedback')";
        if ($conn->query($feedback_query) === TRUE) {
            echo "New customer created successfully. <br>" . $first_name;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


        header("location: contact_fb_sbn.php");
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>