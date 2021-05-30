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
                
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once("../database/database_functions.php");
                            $conn = db_connection();
                            
                           /* $name_query = "SELECT author.author_first_name,author.author_last_name FROM author
                            INNER JOIN author_tag ON author.author_id=author_tag.author_id WHERE author_tag.book_id=4";
                            $result = mysqli_query($conn, $name_query); 
                            $name = mysqli_fetch_assoc($result) ;
                            JOIN feature_tag ON
                             book.book_id=feature_tag.book_id JOIN book_feature ON feature_tag.feature_id=book_feature.feature_id*/
                            
                    

                            $book_query = "SELECT * FROM book JOIN author_tag ON
                             book.book_id=author_tag.book_id INNER JOIN author ON author_tag.author_id=author.author_id
                             JOIN category_tag ON
                             book.book_id=category_tag.book_id JOIN category ON category_tag.category_id=category.category_id
                             
                             INNER JOIN publisher ON book.book_id=book.book_id
                             ";
                             
                             
                
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
                                    title='<?php echo $row['book_title'] ?>'
                                    data-toggle="modal" data-target=".delete-book-modal"></em>
                            </td>


                            <td><?php echo $book_id; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['book_title']; ?></td>
                         
                            <td><?php echo $row['author_first_name']; echo $row['author_last_name']  ; ?></td>
                            
                            <!-- TODO get publisher name -->
                            <td><?php echo $row['publisher']; ?></td>
                            <td><?php echo $row['publishing_year']; ?></td>
                            <td>
                                <?php 
                                    echo $row['category_name'];
                                ?>
                            </td>
                            <td><?php echo $row['pages']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                
                            <!-- TODO get publisher name -->
                         
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
            <?php include('update_book_details.php') ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>

<script src="../assets/js/admin-book-operations.js"></script>