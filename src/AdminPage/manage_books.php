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
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Book ID</th> 
                            <th scope="col">ISBN</th> 
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Year</th>
                            <th scope="col">Category</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Feature</th>
                            <th scope="col">Update/Delete</th>
                            <th scope="col">Number of Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- TODO for loop for displaying books here -->
                        <tr>

                        </tr>
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