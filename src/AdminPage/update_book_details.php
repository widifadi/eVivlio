<?php 
    echo 0;
    
    require_once("../../database/database_functions.php");
    $conn = db_connection();

    $book_id = $_POST['book_id'];
    $query_book = "SELECT * FROM book WHERE book_id=$book_id;";
    $book_result = mysqli_query($conn, $query_book);

    if (mysqli_num_rows($book_result)) {
        $book_row = mysqli_fetch_assoc($book_result);

        // author
        // TODO multiple authors
        $author_id = $book_row['author'];
        $query_author = "SELECT * FROM author WHERE author_id=$author_id;";
        $author_result = mysqli_query($conn, $query_author);
        $author_row = mysqli_fetch_assoc($author_result);
        $author_fname = $author_row['first_name'];
        $author_lname = $author_row['last_name'];

        // publisher
        $publisher_id = $book_row['publisher'];
        $query_publisher = "SELECT * FROM publisher WHERE publisher_id=$publisher_id;";
        $publisher_result = mysqli_query($conn, $query_publisher);
        $publisher_row = mysqli_fetch_assoc($publisher_result);
        $publisher = $publisher_row['publisher_name'];

        // categories
        $category_list = array();
        $categories = explode(",", $book_row['category']);
            foreach ($categories as $category_id) {
                $category_query = "SELECT * FROM category WHERE category_id=$category_id ";
                $category_result = mysqli_query($conn, $category_query);
                $category_row = mysqli_fetch_assoc($category_result);
                $category_name = $category_row['category_code'];
                array_push($category_list, $category_name);
            }

        // features
        $features = array();
        $bestseller_query = "SELECT * FROM best_seller WHERE book_id=$book_id";
        $bestseller_result = mysqli_query($conn, $bestseller_query);
        if (mysqli_num_rows($bestseller_result)) {
            array_push($features, "best-seller");
        }

        $new_query = "SELECT * FROM new_release WHERE book_id=$book_id";
        $new_result = mysqli_query($conn, $new_query);
        if (mysqli_num_rows($new_result)) {
            array_push($features, "new-release");
        }

        $pick_query = "SELECT * FROM editors_pick WHERE book_id=$book_id";
        $pick_result = mysqli_query($conn, $pick_query);
        if (mysqli_num_rows($pick_result)) {
            array_push($features, "editors-pick");
        }

        $book_details = array('isbn' => $book_row['isbn'], 
                            'title' => $book_row['title'],
                            'book_cover' => $book_row['book_cover'],
                            'author_fname' => $author_fname, // TODO multiple authors
                            'author_lname' => $author_lname,
                            'publisher' => $publisher,
                            'publishing_year' => $book_row['publishing_year'],
                            'category' => $category_list,
                            'pages' => $book_row['pages'],
                            'summary' => $book_row['summary'],
                            'price' => $book_row['price'],
                            'stock' => $book_row['stock'],
                            'features' => $features);

        // echo result in JSON format
        echo json_encode($book_details);

    }
      
    mysqli_close($conn);
    

?>