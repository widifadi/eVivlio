<?php

    require_once("../../database/database_functions.php");
    $conn = db_connection();

    if (isset($_POST['add_book_btn'])) {
        $isbn = $_POST['isbn'];
        $isbn = mysqli_real_escape_string($conn, $isbn);

        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);

        // upload cover on img/book-covers cover
        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
			$cover = $_FILES['cover']['name'];

			$upload_directory = dirname(__DIR__, 1) . "/assets/img/book-covers/";
            $ext = end((explode(".", $cover))); # extra () to prevent notice
            $upload_directory .= $isbn . "." . $ext;
			move_uploaded_file($_FILES['cover']['tmp_name'], $upload_directory);

            $book_cover = $isbn . "." . $ext;
		}

        $author_firstname = $_POST['author_firstname'];
        $author_firstname = mysqli_real_escape_string($conn, $author_firstname);
        $author_lastname = $_POST['author_lastname'];
        $author_lastname = mysqli_real_escape_string($conn, $author_lastname);
        // if author is not in db, create new
		$query_author = "SELECT * FROM author
                            WHERE first_name = '$author_firstname' AND 
                                    last_name = '$author_lastname' ";
		$author_result = mysqli_query($conn, $query_author);
        if (!mysqli_num_rows($author_result)) {
			// insert into author table and return id
			$insert_author = "INSERT INTO author (first_name, last_name) 
                                VALUES ('$author_firstname', '$author_lastname') ";
			$insert_author_result = mysqli_query($conn, $insert_author);
			if (!$insert_author_result) {
				echo "Can't add new author " . mysqli_error($conn);
				exit;
			}
			$author_id = mysqli_insert_id($conn);
		} else {
			$author_row = mysqli_fetch_assoc($author_result);
			$author_id = $author_row['author_id'];
		}

        $publisher = $_POST['publisher'];
        $publisher = mysqli_real_escape_string($conn, $publisher);
		// if publisher is not in db, create new
        $query_publisher = "SELECT * FROM publisher WHERE publisher_name='$publisher' ";
        $publisher_result = mysqli_query($conn, $query_publisher);
        if (!mysqli_num_rows($publisher_result)) {
			// insert into publisher table and return id
			$insert_publisher = "INSERT INTO publisher (publisher_name)
                                    VALUES ('$publisher') ";

			$insert_pub_result = mysqli_query($conn, $insert_publisher);
			if (!$insert_pub_result) {
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$publisher_id = mysqli_insert_id($conn);
		} else {
			$pub_row = mysqli_fetch_assoc($publisher_result);
			$publisher_id = $pub_row['publisher_id'];
		}

        $year = $_POST['year'];

        $category = $_POST['category'];
        // TODO use array 
        $categories = "";
        foreach ($category as $choice) 
        {
            $choice = mysqli_real_escape_string($conn, $choice);

            // query category table
            $query_category = "SELECT * FROM category WHERE category_name='$choice' ";
            $category_result = mysqli_query($conn, $query_category);
            $cat_row = mysqli_fetch_assoc($category_result);
            $category_id = $cat_row['category_id'];

            // category as "1,2,3" format
            if (!next($category)) {
                $categories .= $category_id;
            } else {
                $categories .= $category_id . ",";
            }
        }

        $pages = $_POST['pages'];

        $summary = $_POST['summary'];
        $summary = mysqli_real_escape_string($conn, $summary);

        $price = $_POST['price'];

        $stock = $_POST['stocks'];

        $addbook_query = "INSERT INTO book (isbn, title, book_cover, author, publisher, publishing_year, 
                                            category, pages, summary, price, stock)
                            VALUES ('$isbn', '$title', '$book_cover', '$author_id', '$publisher_id', $year, 
                                            '$categories', $pages, '$summary', $price, $stock )";


        if ($conn->query($addbook_query) === TRUE) {
            echo "New book created successfully. <br>";
        } else {
            echo "Book Table Error: " . $sql . "<br>" . $conn->error . "<br>";
        }

        $feature = $_POST['feature'];
        $features = "";
        foreach ($feature as $feature_choice)  
        {  
            if ($feature_choice == 'best_seller') {
                $add_bestseller = "INSERT INTO best_seller(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_bestseller) === TRUE) {
                    echo "New Best Seller record created successfully. <br>";
                } else {
                    echo "Best Seller Table Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            } else if ($feature_choice == 'editors_pick') {
                $add_editorspick = "INSERT INTO editors_pick(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_editorspick) === TRUE) {
                    echo "New Editor's Pick record created successfully. <br>";
                } else {
                    echo "Editor's Pick Table Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            } else if ($feature_choice == 'new_release') {
                $add_newrelease = "INSERT INTO new_release(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_newrelease) === TRUE) {
                    echo "New Release record created successfully. <br>";
                } else {
                    echo "New Release Table Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            }
        }

        header("location: admin_page.php");

    }

    $conn->close();

?>