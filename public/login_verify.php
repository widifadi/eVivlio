<?php
$conn = mysqli_connect('localhost','root','','www_project') or die("Couldn't connect to database");
	session_start();
	if(!isset($_POST['log_button'])){
		echo "Something wrong! Check again!";
		exit;
	}
//	require_once "./functions/database_functions.php";
//	$conn = db_connect();

	$name = trim($_POST['username']);
	$pass = trim($_POST['password']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	//$pass = sha1($pass);

	// get from db

	$query = "SELECT * FROM user WHERE name='$name' AND password = '$pass'";
	$results=mysqli_query($conn,$query);
	if(mysqli_num_rows($results)){

		$_SESSION['username']=$name;
		$_SESSION['success'] ="Logged in Successfully!";
	}
	/*
	$query = "SELECT name, password from user";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	
/*
	while($row = mysqli_fetch_assoc($result));
	{
	if($name != $row['name'] && $pass != $row['password'])
	{
		echo "Name or pass is wrong. Check again!";
		$_SESSION['success'] = false;
		exit;
	}
*/
	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['success'] = true;
	header("Location: MyPage.php");
?>