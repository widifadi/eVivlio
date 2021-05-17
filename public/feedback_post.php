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
<<<<<<< HEAD
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
=======
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
>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


<<<<<<< HEAD
        header("location: contact_fb_sbn.php");
=======
        header("location:contact_fb_sbn.php");
>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6
    }

    if (isset($conn)) {
        mysqli_close($conn);
    }

?>