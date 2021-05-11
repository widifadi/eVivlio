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

                            $book_query = "SELECT * FROM book";
                            $result = mysqli_query($conn, $book_query); 
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                $book_id = $row['book_id'];
                        ?>
                        <tr>
                            <td>
                                <!-- TODO enable operations -->
                                <i class="fas fa-edit"></i>
                                <!-- TODO modify hover color and cursor -->
                                <i class="fas fa-trash-alt" data-toggle="modal" data-target="#delete-<?php echo $book_id?>"></i>
                            </td>
                            <td><?php echo $book_id; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['publisher']; ?></td>
                            <td><?php echo $row['publishing_year']; ?></td>
                            <td>
                                <?php 
                                    $categories = explode(",", $row['category']);
                                    foreach ($categories as $category_id) {
                                        $category_query = "SELECT * FROM category WHERE category_id=$category_id ";
                                        $category_result = mysqli_query($conn, $category_query);
                                        $category_row = mysqli_fetch_assoc($category_result);
                                        $category_name = $category_row['category_name'];

                                        if (!next($categories)) {
                                            echo $category_name;
                                        } else {
                                            echo $category_name . ", ";
                                        }
                                    }
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

<!-- Modal -->
<div class="modal fade" id="delete-bookidhere" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>