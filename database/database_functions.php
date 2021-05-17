<?php

	function db_connection() {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "evivlio";

		$user_agent = getenv("HTTP_USER_AGENT");

		if (strpos($user_agent, "Mac") !== FALSE) {
			$password = "root";
		}

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		
		return $conn;
	}

?>