<?php

	function db_connection() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "evivlio";

		$conn = mysqli_connect($servername, $username,'', $dbname);

		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		
		return $conn;
	}

?>