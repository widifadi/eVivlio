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

    $book_id = $_GET['book_id'];

    $query_book = "SELECT * FROM book WHERE book_id=$book_id;";
    $book_result = mysqli_query($conn, $query_book);

    if (mysqli_num_rows($book_result)) {
        $book_row = mysqli_fetch_assoc($book_result);

        $book_details = array('isbn' => $book_row['isbn'], 
                            'title' => $book_row['title'], 
                            'author' => $book_row['author'], // TODO
                            'publisher' => $book_row['publisher'],  // TODO
                            'publishing_year' => $book_row['publishing_year'],
                            'category' => $book_row['category'],
                            'pages' => $book_row['pages'],
                            'summary' => $book_row['summary'],
                            'price' => $book_row['price'],
                            'stock' => $book_row['stock']);

        // TODO features

        // echo result in JSON format
        echo json_encode($book_details);

    }
      
    mysqli_close($conn);

?>