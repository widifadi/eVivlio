<?php 
    // TODO do sql connection only once for the whole app
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "eVivlio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['add_book_btn'])) {
        $isbn = $_POST['isbn'];
        $isbn = mysqli_real_escape_string($conn, $isbn);

        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);

        // TODO cover
        if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
			$cover = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
            echo $directory_self;
			$upload_directory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "/assets/img/book-covers/";
			$upload_directory .= $cover;
			move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory);
		}

        $author_firstname = $_POST['author_firstname'];
        $author_firstname = mysqli_real_escape_string($conn, $author_firstname);
        $author_lastname = $_POST['author_lastname'];
        $author_lastname = mysqli_real_escape_string($conn, $author_lastname);
        // if author is not in db, create new
		$query_author = "SELECT * FROM author 
                            WHERE author_firstname = '$author_firstname' AND 
                                    author_lastname = '$author_lastname' ";
		$author_result = mysqli_query($conn, $query_author);
        if (!$author_result) {
			// insert into author table and return id
			$insert_author = "INSERT INTO author (first_name, last_name) 
                                VALUES ('$author_firstname', '$author_lastname')";
			$insert_author_result = mysqli_query($conn, $insert_author);
			if(!$insert_author_result){
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
        $query_publisher = "SELECT * FROM publisher WHERE name = '$publisher' ";
		$publisher_result = mysqli_query($conn, $query_publisher);
        if (!$publisher_result) {
			// insert into publisher table and return id
			$insert_publisher = "INSERT INTO publisher (name) VALUES ('$publisher')";
			$insert_pub_result = mysqli_query($conn, $insert_publisher);
			if(!$insert_pub_result){
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
        $categories = "";
        foreach ($category as $choice)  
        {
            // query category table
            $query_category = "SELECT * FROM category WHERE name = '$choice' ";
            $category_result = mysqli_query($conn, $query_category);
            $cat_row = mysqli_fetch_assoc($category_result);
            $category_id = $pub_row['category_id'];

            // category as array
            $categories .= $category_id . ",";  
        }

        $pages = $_POST['pages'];

        $summary = $_POST['summary'];
        $summary = mysqli_real_escape_string($conn, $summary); // TODO long text

        $price = $_POST['price'];

        $stock = $_POST['stocks'];

        $addbook_query = "INSERT INTO book (isbn, title, cover, author, publisher, year, 
                                            category, pages, summary, price, stock)
                            VALUES ('$isbn', '$title', '$cover', '$author_id', '$publisher_id', '$year', 
                                            '$categories', '$pages', '$summary', '$price', '$stock')";


        if ($conn->query($addbook_query) === TRUE) {
            echo "New book created successfully. <br>";
        } else {
            echo "Book Table Error: " . $sql . "<br>" . $conn->error;
        }

        $feature = $_POST['feature'];
        $features = "";
        foreach ($feature as $feature_choice)  
        {  
            if ($feature_choice == 'best_seller') {
                $add_bestseller = "INSERT INTO best_seller(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_bestseller) === TRUE) {
                    echo "New Best Seller record created successfully.";
                } else {
                    echo "Best Seller Table Error: " . $sql . "<br>" . $conn->error;
                }
            } else if ($feature_choice == 'editors_pick') {
                $add_editorspick = "INSERT INTO editors_pick(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_editorspick) === TRUE) {
                    echo "New Editor's Pick record created successfully.";
                } else {
                    echo "Editor's Pick Table Error: " . $sql . "<br>" . $conn->error;
                }
            } else if ($feature_choice == 'new_release') {
                $add_newrelease = "INSERT INTO new_release(book_id) 
                                    SELECT book_id FROM book WHERE isbn = '$isbn' ";
                if ($conn->query($add_newrelease) === TRUE) {
                    echo "New Release record created successfully.";
                } else {
                    echo "New Release Table Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

    $conn->close();

?>