<form action="../src/AdminPage/update_book_post.php" method="POST" id="update-book-form" 
    enctype="multipart/form-data">
    <input type="number" id="update-book-id" name="book_id" hidden>

    <div class="form-group row">
        <label for="isbn" class="col-sm-3 col-form-label updatebook-label">ISBN</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-isbn" name="isbn" 
            placeholder="ISBN" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label updatebook-label">Book Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-title" name="title" 
            placeholder="Title" required>
        </div>
    </div>

    <input type="text" id="current-book-cover" name="current_book_cover" hidden>
    <div class="form-group row">
        <label for="update-cover" class="col-sm-3 col-form-label updatebook-label">Book Cover</label>
        <div class="col-sm-9">
        <img class="" id="current-cover" src="" width="100px" alt="book cover"> <br>
        Choose new cover: <input type="file" name="cover" id="update-cover">
        </div>
    </div>

    <div class="form-group row">
        <label for="author" class="col-sm-3 col-form-label updatebook-label">Author</label>
        <div class="col-sm-9">
        <div class="row" style="margin-bottom: 10px;">
                <div class="col">
                    <input type="text" class="form-control" name="author_firstname[]" 
                        placeholder="First Name" id="update-author-firstname-0" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="author_lastname[]" 
                        placeholder="Last Name" id="update-author-lastname-0">
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col">
                    <input type="text" class="form-control" name="author_firstname[]" 
                        placeholder="First Name" id="update-author-firstname-1">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="author_lastname[]" 
                        placeholder="Last Name" id="update-author-lastname-1">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="author_firstname[]" 
                        placeholder="First Name" id="update-author-firstname-2">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="author_lastname[]" 
                        placeholder="Last Name" id="update-author-lastname-2">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="publisher" class="col-sm-3 col-form-label updatebook-label">Publisher</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-publisher" name="publisher" 
            placeholder="Publisher" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="year" class="col-sm-3 col-form-label updatebook-label">Publishing Year</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-year" name="year" 
            placeholder="Publishing Year" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="update-category" class="col-sm-3 col-form-label updatebook-label">Category</label>
        <div class="col-sm-9 form-check">
            <div class="row">
                <div class="col">
                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Business" id="update-category-1">
                    <label class="form-check-label" for="update-category-1">Business</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Children Collection" id="update-category-2">
                    <label class="form-check-label" for="update-category-2">Children's Collection</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="History" id="update-category-3"> 
                    <label class="form-check-label" for="update-category-3">History</label><br>                    

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Literature" id="update-category-4">
                    <label class="form-check-label" for="update-category-4">Literature</label><br>                
                </div>
                <div class="col">
                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Novels" id="update-category-5">
                    <label class="form-check-label" for="update-category-5">Novels</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]"
                        value="Science Fiction" id="update-category-6">
                    <label class="form-check-label" for="update-category-6">Science Fiction</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Science and Technology" id="update-category-7">
                    <label class="form-check-label" for="update-category-7">Science & Technology</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Philosophy" id="update-category-8">
                    <label class="form-check-label" for="update-category-8">Philosophy</label><br>                                    
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="pages" class="col-sm-3 col-form-label updatebook-label">Number of Pages</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-pages" name="pages" 
            placeholder="Number of Pages" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="summary" class="col-sm-3 col-form-label updatebook-label">Summary</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="update-summary" name="summary" rows="5" required></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-sm-3 col-form-label updatebook-label">Price</label>
        <div class="col-sm-9 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
            </div>
            <input type="number" step="0.01" class="form-control" id="update-price" name="price" 
                placeholder="Price" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="stocks" class="col-sm-3 col-form-label updatebook-label">Stocks Available</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-stocks" name="stocks" 
            placeholder="10" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="feature" class="col-sm-3 col-form-label updatebook-label">Feature</label>
        <div class="col-sm-9 form-check">
            <input class="form-check-input update-feature" type="checkbox" name="feature[]" 
                value="Best Sellers" id="update-feature-1"> 
            <label class="form-check-label" for="update-feature-1">Best Seller of the Month</label><br>

            <input class="form-check-input update-feature" type="checkbox" name="feature[]" 
                value="Editor Recommends" id="update-feature-2"> 
            <label class="form-check-label" for="update-feature-2">Editor's Pick</label><br>

            <input class="form-check-input update-feature" type="checkbox" name="feature[]" 
                value="New Release" id="update-feature-3"> 
            <label class="form-check-label" for="update-feature-3">New Release</label><br>
        </div>
    </div>
    
    <div class="text-center">
        <button class="btn blue-theme-btn" type="submit" name="update-book-btn"
            id="update-book-btn">Update Book Details</button>                                 
    </div>
</form>

