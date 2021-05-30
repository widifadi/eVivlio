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

	function GetAuthorName($conn, $author_id) {
		$conn = db_connection();	// you dont need this declaration here since it's already your parameter

		$query = "SELECT author_first_name FROM author WHERE author_id = '$author_id'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
			if(mysqli_num_rows($result) == 0){
				echo "Empty author ! Something wrong! check again";
				exit;
			}
	
			$row = mysqli_fetch_assoc($result);
			return $row['author_first_name'];
		}

?>