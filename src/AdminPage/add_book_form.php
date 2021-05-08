<form action="add_book_post.php" method="POST" id="add-book-form">
    <div class="form-group row">
        <!-- TODO integer? -->
        <label for="isbn" class="col-sm-3 col-form-label addbook-label">ISBN</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="isbn" name="isbn" 
            placeholder="ISBN" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label addbook-label">Book Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="title" name="title" 
            placeholder="Title" required>
        </div>
    </div>

    <div class="form-group row">
        <!-- TODO subgroup for author table  -->
        <label for="author" class="col-sm-3 col-form-label addbook-label">Author</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="author" name="author" 
            placeholder="Author" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="year" class="col-sm-3 col-form-label addbook-label">Publishing Year</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="year" name="year" 
            placeholder="Publishing Year">
        </div>
    </div>

    <div class="form-group row">
        <label for="publisher" class="col-sm-3 col-form-label addbook-label">Publisher</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="publisher" name="publisher" 
            placeholder="Publisher">
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-3 col-form-label addbook-label">Genre</label>
        <!-- TODO 2 columns -->
        <div class="col-sm-9 form-check">
            <input class="form-check-input" type="checkbox" value="" id="history"> History<br>
            <input class="form-check-input" type="checkbox" value="" id="scifi"> Science Fiction<br>
            <input class="form-check-input" type="checkbox" value="" id="literature"> Literature<br>
            <input class="form-check-input" type="checkbox" value="" id="scitech"> Science & Technology<br>
            <input class="form-check-input" type="checkbox" value="" id="philo"> Philosophy<br>
            <input class="form-check-input" type="checkbox" value="" id="business"> Business<br>
            <input class="form-check-input" type="checkbox" value="" id="novels"> Novels<br>
            <input class="form-check-input" type="checkbox" value="" id="childrens"> Children's Collection<br>
        </div>
    </div>

    <div class="form-group row">
        <label for="pages" class="col-sm-3 col-form-label addbook-label">Number of Pages</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="pages" name="pages" 
            placeholder="Number of Pages" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="summary" class="col-sm-3 col-form-label addbook-label">Summary</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="summary" name="summary" rows="5" required></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-sm-3 col-form-label addbook-label">Price</label>
        <div class="col-sm-9">
            <!-- TODO float -->
            <!-- TODO input group for euros -->
        <input type="text" class="form-control" id="price" name="price" 
            placeholder="Price" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="stocks" class="col-sm-3 col-form-label addbook-label">Stocks Available</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="stocks" name="stocks" 
            placeholder="10" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="feature" class="col-sm-3 col-form-label addbook-label">Feature?</label>
        <div class="col-sm-9">
            <!-- TODO selection -->
        <input type="text" class="form-control" id="feature" name="feature" required>
        </div>
    </div>
    
    <div class="text-center">
        <button class="btn btn-secondary" type="submit" name="add_book_btn"
            id="add_book_btn">Add Book</button>                                 
    </div>
</form>

