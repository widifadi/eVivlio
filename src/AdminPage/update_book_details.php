<?php 
    
    require_once("../../database/database_functions.php");
    $conn = db_connection();

    $book_id = $_POST['book_id'];
    $query_book = "SELECT * FROM book WHERE book_id=$book_id;";
    $book_result = mysqli_query($conn, $query_book);

    if (mysqli_num_rows($book_result)) {
        $book_row = mysqli_fetch_assoc($book_result);

        $authors_firstname = array();
        $authors_lastname = array();
        $author_query = "SELECT author.author_first_name, author.author_last_name FROM author 
                            INNER JOIN author_tag 
                            ON author_tag.author_id = author.author_id 
                            WHERE author_tag.book_id = $book_id;";
        $author_result = mysqli_query($conn, $author_query); 
        while ($author_row = mysqli_fetch_assoc($author_result)) {
            array_push($authors_firstname, $author_row['author_first_name']);
            array_push($authors_lastname, $author_row['author_last_name']);
        }

        $publisher_id = $book_row['publisher_id'];
        $query_publisher = "SELECT * FROM publisher WHERE publisher_id=$publisher_id;";
        $publisher_result = mysqli_query($conn, $query_publisher);
        $publisher_row = mysqli_fetch_assoc($publisher_result);
        $publisher = $publisher_row['publisher'];

        $categories = array();
        $category_query = "SELECT category.category_id FROM category 
                            INNER JOIN category_tag 
                            ON category_tag.category_id = category.category_id 
                            WHERE category_tag.book_id = $book_id; ";
        $category_result = mysqli_query($conn, $category_query); 
        while ($category_row = mysqli_fetch_assoc($category_result)) {
            array_push($categories, $category_row['category_id']);
        }

        $features = array();
        $feature_query = "SELECT book_feature.feature_id FROM book_feature 
                            INNER JOIN feature_tag 
                            ON feature_tag.feature_id = book_feature.feature_id 
                            WHERE feature_tag.book_id = $book_id; ";
        $feature_result = mysqli_query($conn, $feature_query); 
        while ($feature_row = mysqli_fetch_assoc($feature_result)) {
            array_push($features, $feature_row['feature_id']);
         }

        $book_details = array('isbn' => $book_row['isbn'], 
                            'title' => $book_row['book_title'],
                            'book_cover' => $book_row['book_cover'],
                            'authors_firstname' => $authors_firstname, // TODO multiple authors
                            'authors_lastname' => $authors_lastname,
                            'publisher' => $publisher,
                            'publishing_year' => $book_row['publishing_year'],
                            'categories' => $categories,
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