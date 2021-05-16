<?php
function db_connection(){
		$conn = mysqli_connect("localhost", "root", "", "evivlio");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}

    ?>