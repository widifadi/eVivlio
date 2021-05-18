<?php
    include("../../database/database_functions.php");
    $conn = db_connection();

    $keyword = $_POST['keyword'];

    // TODO author keyword
    $search_results = array();

    $query = "SELECT * FROM book WHERE book_title LIKE '%$keyword%'; "; 
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) 
    {

        $book_id = $row['book_id'];

        $author_query = "SELECT * FROM author WHERE author.author_id IN 
                        (SELECT author_tag.author_id FROM author_tag 
                            WHERE author_tag.book_id=$book_id);";
        $author_result = mysqli_query($conn, $author_query);
        $author_row = mysqli_fetch_assoc($author_result);
        $author_firstname = $author_row['author_first_name'];
        $author_lastname = $author_row['author_last_name'];

        $book_row = array('isbn' => $row['isbn'], 
                        'book_title' => $row['book_title'],
                        'book_cover' => $row['book_cover'],
                        'author_firstname' => $author_firstname,
                        'author_lastname' => $author_lastname,
                        'publishing_year' => $row['publishing_year'],
                        'price' => $row['price']);

        // echo result in JSON format
        array_push($search_results, $book_row);
        
    }

    echo json_encode($search_results);

    mysqli_close($conn);
?>