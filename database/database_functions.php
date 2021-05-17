<?php

	function db_connection() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "evivlio";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		
		return $conn;
	}

?>