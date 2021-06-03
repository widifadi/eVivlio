<?php require_once("../../templates/header.php"); ?>


<?php 
    require_once("../../database/database_functions.php");
    $conn = db_connection();
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

    mysqli_close($conn);
?>