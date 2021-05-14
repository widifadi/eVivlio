<div class="row book-details" style="padding: 5px; margin-top:10px;">
    <div class="col-4 book-detail-preview text-center">
        <img src="../assets/img/book-samples/tlor.jpeg" alt="Lord of the Rings" width="200">
        <br>
        <span class="book-title">The Lord of the Rings</span> <br>
        <span class="book-author">J. R. R. Tolkien (1995)</span> <br>
        <span class="badge badge-pill badge-secondary book-price">€30.00</span>
        <br>
        <br>
        <span style="color: #396273">
        Stocks available:<span class="stock-detail">10</span>
        </span>
        <br>
        <br>
        <em class="fas fa-cart-plus add-cart-btn"></em>
        <em class="fas fa-heart add-wlist-btn"></em>
    </div>

    <div class="col-8 book-detail-div">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active book-detail-tab" id="summary-tab" 
                    data-toggle="tab" href="#summary" role="tab" 
                    aria-controls="summary" aria-selected="true">Summary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link book-detail-tab" id="details-tab" 
                    data-toggle="tab" href="#details" role="tab" 
                    aria-controls="details" aria-selected="false">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link book-detail-tab" id="review-tab" 
                    data-toggle="tab" href="#reviews" role="tab" 
                    aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <!-- Tabs navs -->
        
        <!-- Tabs content -->
        <div class="tab-content" id="myTabContent" style="border: solid 1px #F2F2F2;">
            <div class="tab-pane fade show active" id="summary" role="tabpanel" 
                aria-labelledby="summary-tab" style="font-size: 14px; padding: 10px;">
                <p>Continuing the story begun in The Hobbit, all three parts of the epic masterpiece, The Lord of the Rings, in one paperback. Features the definitive edition of the text, fold-out flaps with the original two-colour maps, and a revised and expanded index. Sauron, the Dark Lord, has gathered to him all the Rings of Power - the means by which he intends to rule Middle-earth.
                </p> 
                <p>All he lacks in his plans for dominion is the One Ring - the ring that rules them all - which has fallen into the hands of the hobbit, Bilbo Baggins. In a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as the Ring is entrusted to his care. He must leave his home and make a perilous journey across the realms of Middle-earth to the Crack of Doom, deep inside the territories of the Dark Lord.
                </p>
                <p>There he must destroy the Ring forever and foil the Dark Lord in his evil purpose. Since it was first published in 1954, The Lord of the Rings has been a book people have treasured. Steeped in unrivalled magic and otherworldliness, its sweeping fantasy has touched the hearts of young and old alike.
                </p>
                <p>This single-volume paperback edition is the definitive text, fully restored with almost 400 corrections - with the full co-operation of Christopher Tolkien - and features a striking new cover.
                </p>
            </div>
            <div class="tab-pane fade" id="details" role="tabpanel" 
                aria-labelledby="details-tab" style="padding: 10px;">
                Publisher: <span class="publisher">HarperCollins Publishers</span>
                <br>
                Publication Year: <span class="publishing-year"> 1995</span>
                <br>
                ISBN: <span class="isbn">978-0-26110-325-2</span>
                <br>
                Number of Pages: <span class="pages">102</span>
                <br>
                Categories: <span class="categories"></span>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" 
                aria-labelledby="reviews-tab" style="padding: 10px;">
                <div class="card text-center">
                    <div class="card-header" style="color:#396273;">
                        Post a Review
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <div class="rate mx-auto" id="book-rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="raratingte" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <em class="fa fa-comment" style="color:#396273;"></em>
                                        </div>
                                    </div>
                                    <textarea class="form-control" rows="5" id="review" name="review" 
                                        placeholder="Write a review." required></textarea>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn blue-theme-btn mb-2" 
                                    name="submit-review-btn" style="width:100%;">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="book-reviews">

                </div>
            </div>
        </div>
        <!-- Tabs content -->
        
    </div>

</div>

