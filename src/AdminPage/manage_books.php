<div class="">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active update-tab managebook-tab" id="update-tab" 
                data-toggle="tab" href="#update" role="tab" 
                aria-controls="update" aria-selected="true">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link add-tab managebook-tab" id="add-tab" 
                data-toggle="tab" href="#add" role="tab" 
                aria-controls="add" aria-selected="false">Add</a>
        </li>
    </ul>
    <!-- Tabs navs -->
    
    <!-- Tabs content -->
    <div class="tab-content" id="managebook-content" style="border: solid 1px #F2F2F2;">
        <div class="tab-pane fade show active" id="update" role="tabpanel" 
            aria-labelledby="update-tab" style="font-size: 14px; padding: 10px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Update</th>
                            <th scope="col">Book ID</th> 
                            <th scope="col">ISBN</th> 
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Year</th>
                            <th scope="col">Category</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Feature</th>
                            <th scope="col">Number of Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // include("../../database/database_functions.php");
                            // $conn = db_connection();
                            
                            // TODO do sql connection only once for the whole app
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "evivlio";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $book_query = "SELECT * FROM book";
                            $result = mysqli_query($conn, $book_query); 
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                $book_id = $row['book_id'];
                        ?>
                        <tr id=<?php echo $book_id ?> >
                            <td>
                                <em class="fas fa-edit update-book" 
                                    id="updatebook-<?php echo $book_id ?>"
                                    data-toggle="modal" data-target=".update-book-modal"></em>
                                <em class="fas fa-trash-alt delete-book"
                                    id="deletebook-<?php echo $book_id ?>" 
                                    title='<?php echo $row['title'] ?>'
                                    data-toggle="modal" data-target=".delete-book-modal"></em>
                            </td>
                            <td><?php echo $book_id; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <!-- TODO get author name -->
                            <td><?php echo $row['author']; ?></td>
                            <!-- TODO get publisher name -->
                            <td><?php echo $row['publisher']; ?></td>
                            <td><?php echo $row['publishing_year']; ?></td>
                            <td>
                                <?php 
                                    $categories = explode(",", $row['category']);
                                    $category_list = array();
                                    foreach ($categories as $category_id) {
                                        $category_query = "SELECT * FROM category WHERE category_id=$category_id ";
                                        $category_result = mysqli_query($conn, $category_query);
                                        $category_row = mysqli_fetch_assoc($category_result);
                                        $category_name = $category_row['category_name'];

                                        array_push($category_list, $category_name);
                                    }
                                    echo implode(", ", $category_list);
                                ?>
                            </td>
                            <td><?php echo $row['pages']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td>
                                <?php
                                    $features = array();

                                    $bestseller_query = "SELECT * FROM best_seller WHERE book_id=$book_id";
                                    $bestseller_result = mysqli_query($conn, $bestseller_query);
                                    if (mysqli_num_rows($bestseller_result)) {
                                        array_push($features, "Best Seller");
                                    }

                                    $new_query = "SELECT * FROM new_release WHERE book_id=$book_id";
                                    $new_result = mysqli_query($conn, $new_query);
                                    if (mysqli_num_rows($new_result)) {
                                        array_push($features, "New Release");
                                    }

                                    $pick_query = "SELECT * FROM editors_pick WHERE book_id=$book_id";
                                    $pick_result = mysqli_query($conn, $pick_query);
                                    if (mysqli_num_rows($pick_result)) {
                                        array_push($features, "Editor's Pick");
                                    }

                                    echo implode(", ", $features);
                                    // TODO put into bootstrap badge
                                ?>
                            </td>
                            <td>
                                <!-- TODO order summary -->
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="add" role="tabpanel" 
            aria-labelledby="add-tab" style="padding: 10px;">
            <?php require_once("add_book_form.php") ?>
        </div>
    </div>
    <!-- Tabs content -->
</div>

<!-- Delete Book Modal -->
<div class="modal fade delete-book-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Book Deletion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Delete <span id="book-title"></span>?
            <br>
            <br>
            <div class="alert" id="delete-response" role="alert"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="delete-book-btn">Delete Book</button>
        </div>
        </div>
    </div>
</div>

<!-- Update Book Modal -->
<div class="modal fade update-book-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Book Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php include("update_book_form.php") ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-book-operations.js"></script>