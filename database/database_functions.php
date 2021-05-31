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

	function featured_books_list($conn, $feature_name) {
        $feature_book_ids = array();

        $feature_query= "SELECT book.book_id FROM book
                          JOIN feature_tag ON feature_tag.book_id=book.book_id
                          JOIN book_feature ON book_feature.feature_id=feature_tag.feature_id
                          WHERE feature_name='$feature_name'; ";
        $feature_result=mysqli_query($conn,$feature_query);
        
        if(mysqli_num_rows($feature_result) == 0) {
            echo "No featured books.";
        } else {
            while ($book_item = mysqli_fetch_assoc($feature_result)) {
                array_push($feature_book_ids, $book_item['book_id']);
            }
        }
        return $feature_book_ids;
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