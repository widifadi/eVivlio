<?php
    require_once("../../database/database_functions.php");
    $conn = db_connection();

    $isbn = $_POST['isbn'];
    $isbn = mysqli_real_escape_string($conn, $isbn);

    $title = $_POST['title'];
    $title = mysqli_real_escape_string($conn, $title);

    // upload cover on img/book-covers cover
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $cover = $_FILES['cover']['name'];

        $upload_directory = dirname(__DIR__, 2) . "/assets/img/book-covers/";
        $ext = end((explode(".", $cover))); # extra () to prevent notice
        $upload_directory .= $isbn . "." . $ext;
        move_uploaded_file($_FILES['cover']['tmp_name'], $upload_directory);

        $book_cover = $isbn . "." . $ext;
    }

    // multiple authors
    $author_ids = array();
    $author_firstnames = $_POST['author_firstname'];
    $author_lastnames = $_POST['author_lastname'];

    foreach($author_firstnames as $key=>$author_firstname) {
        $author_firstname = mysqli_real_escape_string($conn, $author_firstname);

        $author_lastname = $author_lastnames[$key];
        $author_lastname = mysqli_real_escape_string($conn, $author_lastname);

        if ($author_firstname != "" || $author_lastname != "") {
            // if author is not in db, create new
            $query_author = "SELECT * FROM author
                    WHERE author_first_name = '$author_firstname' AND 
                            author_last_name = '$author_lastname' ";
            $author_result = mysqli_query($conn, $query_author);
            if (!mysqli_num_rows($author_result)) {
                // insert into author table and return id
                $insert_author = "INSERT INTO author (author_first_name, author_last_name) 
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
            array_push($author_ids, $author_id);
        }
    }

    $publisher = $_POST['publisher'];
    $publisher = mysqli_real_escape_string($conn, $publisher);
    // if publisher is not in db, create new
    $query_publisher = "SELECT * FROM publisher WHERE publisher='$publisher' ";
    $publisher_result = mysqli_query($conn, $query_publisher);
    if (!mysqli_num_rows($publisher_result)) {
        // insert into publisher table and return id
        $insert_publisher = "INSERT INTO publisher (publisher) VALUES ('$publisher') ";

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

    $publishing_year = $_POST['year'];

    $pages = $_POST['pages'];

    $summary = $_POST['summary'];
    $summary = mysqli_real_escape_string($conn, $summary);

    $price = $_POST['price'];
    $stock = $_POST['stocks'];

    $addbook_query = "INSERT INTO book (publisher_id, isbn, book_title, book_cover, publishing_year, 
                                        pages, summary, price, stock)
                        VALUES ('$publisher_id', '$isbn', '$title', '$book_cover', '$publishing_year', 
                                        $pages, '$summary', $price, $stock )";

    if (mysqli_query($conn, $addbook_query)) {
        echo "New book created successfully. <br>";
    } else {
        echo "book table Error: " . mysqli_error($conn) . "<br>";
    }

    $new_book_id = mysqli_insert_id($conn);

    // add to author_tag table
    foreach ($author_ids as $author_id_val) {
        $author_tag_query = "INSERT INTO author_tag (book_id, author_id) 
                            VALUES ($new_book_id, $author_id_val);";
        if (mysqli_query($conn, $author_tag_query)) {
            echo "New author_tag created successfully. <br>";
        } else {
            echo "author_tag table Error: " . mysqli_error($conn);
        }
    }

    // add to category_tag table
    $category = $_POST['category'];
    foreach ($category as $category_choice) {
        $category_query = "SELECT * FROM category WHERE category_name='$category_choice'; ";
        $category_result = mysqli_query($conn, $category_query);
        $cat_row = mysqli_fetch_assoc($category_result);
        $category_id = $cat_row['category_id'];

        $category_tag_query = "INSERT INTO category_tag (book_id, category_id) 
                                VALUES ($new_book_id, $category_id); ";
        if (mysqli_query($conn, $category_tag_query)) {
            echo "New category_tag created successfully. <br>";
        } else {
            echo "category_tag table Error: " . mysqli_error($conn);
        }
    }

    // add to feature_tag table
    $feature = $_POST['feature'];
    $features = "";
    foreach ($feature as $feature_choice) {
        $feature_query = "SELECT * FROM book_feature WHERE feature_name='$feature_choice'; ";
        $feature_result = mysqli_query($conn, $feature_query);
        $feat_row = mysqli_fetch_assoc($feature_result);
        $feature_id = $feat_row['feature_id'];

        $feature_tag_query = "INSERT INTO feature_tag (book_id, feature_id) 
                                VALUES ($new_book_id, $feature_id); ";
        if (mysqli_query($conn, $feature_tag_query)) {
            echo "New feature_tag created successfully. <br>";
        } else {
            echo "feature_tag table Error: " . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);

?>