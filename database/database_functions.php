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

		if (!$conn) {
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		
		return $conn;
	}


	function get_featured_books_list($conn, $feature_name) {
        $feature_book_ids = array();

        $feature_query= "SELECT book.book_id FROM book
                          JOIN feature_tag ON feature_tag.book_id=book.book_id
                          JOIN book_feature ON book_feature.feature_id=feature_tag.feature_id
                          WHERE feature_name='$feature_name' ORDER BY RAND()*1000 ";
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


	function get_book_authors($conn, $book_id) {
		$authors = array();
		$author_query = "SELECT author.author_first_name, author.author_last_name FROM author 
						INNER JOIN author_tag 
						ON author_tag.author_id = author.author_id 
						WHERE author_tag.book_id = $book_id;";
		$author_result = mysqli_query($conn, $author_query);

		while($author_row = mysqli_fetch_assoc($author_result)) {
			array_push($authors, $author_row['author_first_name'] . " " . $author_row['author_last_name']);
		}

		return implode(", ", $authors);
	}


	function get_book_publisher($conn, $publisher_id) {
		$query_publisher = "SELECT * FROM publisher WHERE publisher_id=$publisher_id;";
		$publisher_result = mysqli_query($conn, $query_publisher);
		$publisher_row = mysqli_fetch_assoc($publisher_result);
		
		return $publisher_row['publisher'];
	}


	function get_book_categories($conn, $book_id) {
		$categories = array();
		$category_query = "SELECT category.category_name FROM category 
							INNER JOIN category_tag 
							ON category_tag.category_id = category.category_id 
							WHERE category_tag.book_id = $book_id; ";
		$category_result = mysqli_query($conn, $category_query); 

		while($category_row = mysqli_fetch_assoc($category_result)) {
			array_push($categories, $category_row['category_name']);
		}
		return implode(", ", $categories);
	}


	function get_book_features($conn, $book_id) {
		$features = array();
		$feature_query = "SELECT book_feature.feature_name FROM book_feature 
							INNER JOIN feature_tag 
							ON feature_tag.feature_id = book_feature.feature_id 
							WHERE feature_tag.book_id = $book_id; ";
		$feature_result = mysqli_query($conn, $feature_query);

		while ($feature_row = mysqli_fetch_assoc($feature_result)) {
			array_push($features, $feature_row['feature_name']);
		}
		return implode(", ", $features);
	}

?>