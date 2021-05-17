<!-- TODO how to get results from here? POST => GET?? -->
<?php
    include("../database/database_functions.php");
    // $conn = db_connection(); // give error idk why

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "evivlio";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        echo "Can't connect database " . mysqli_connect_error($conn);
        exit;
    }

    $keyword = $_POST['keyword'];

    // TODO author keyword
    $query = "SELECT * FROM book WHERE book_title LIKE '$keyword'; "; 
    $result = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo 0;
    }

    // TODO return results
    // header("location: ../../public/search_results_page.php");

    mysqli_close($conn);
?>