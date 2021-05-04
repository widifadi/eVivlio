<?php 
     // require_once "./functions/database_functions.php";

    $conn = mysqli_connect('localhost','root','','www_project') or die("Couldn't connect to database");

    if (isset($_POST['reg_button'])){
    $Fname    =   $_POST['Fname'];
    $Lname    =   $_POST['Lname'];
    $email    =   $_POST['email'];
    $username =   $_POST['username'];
    $password =   $_POST['password'];
    $password_check = $_POST['password'];
    $address  =   $_POST['address'];
    $contact  =   $_POST['contact'];
    $city     =   $_POST['city'];
    $zipcode  =   $_POST['zipcode'];
    $country  =   $_POST['country'];

    
        $Fname =mysqli_real_escape_string($conn, $_POST['Fname']);
        $Lname =mysqli_real_escape_string($conn, $_POST['Lname']);
        $email =mysqli_real_escape_string($conn, $_POST['email']);
        $username =mysqli_real_escape_string($conn, $_POST['username']);
        $password =mysqli_real_escape_string($conn, $_POST['password']);
        $password_check =mysqli_real_escape_string($conn, $_POST['password']);
        $address =mysqli_real_escape_string($conn, $_POST['address']);
        $contact =mysqli_real_escape_string($conn, $_POST['contact']);
        $city =mysqli_real_escape_string($conn, $_POST['city']);
        $zipcode =mysqli_real_escape_string($conn, $_POST['zip']);
        $country =mysqli_real_escape_string($conn, $_POST['country']);
       // $password = md5($password); 

        if($password!=$password_check){

            echo ' Passwords do no match !';
         }

    $query = "INSERT INTO customerdata (Fname,Lname,email,address,contact,city,zipcode,country) VALUES ('$Fname','$Lname','$email', '$address','$contact','$city', '$zipcode','$country')";
    
    mysqli_query($conn,$query);
    $sqlquery = "INSERT INTO user (name,password) VALUES ('$username', '$password')";
    mysqli_query($conn,$sqlquery);
    $_SESSION['success'] = " Hello ,You are now logged in !";
    header("location: index.php");
} 
?>