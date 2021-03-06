$("#add-book-btn").click(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../src/AdminPage/add_book_post.php',
        data: $('#add-book-form').serialize(),
        success: function(response) {
            $('.add-book-response').html("Book added successfully. Page reloading.");
            $('.add-book-response').addClass("alert-success");
            $('.add-book-response').show(); 

            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    })
});


$('.delete-book').click(function() {
    var book_id = $(this).attr('id').split("-")[1];
    var book_title = $(this).attr('title');

    $("#book-title").html(book_title);

    var delete_post = "../src/AdminPage/delete_book_post.php";

    $("#delete-book-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: { "book_id": book_id },
            success: function(response) {
                if (response == 0) {
                    $(".delete-response").html("Book deleted successfully. <br> Reloading the page.");
                    $(".delete-response").addClass("alert-success");
                    $(".delete-response").show();

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $(".delete-response").html(response + "<br> Reloading the page.");
                    $(".delete-response").addClass("alert-danger");
                    $(".delete-response").show();

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
        });
    });
});


$('.update-book').click(function() {
    var update_book_id = $(this).attr('id').split("-")[1];

    var update_book_details = "../src/AdminPage/update_book_details.php";

    // get book details
    $.ajax({
        type: 'POST',
        url: update_book_details,
        data: { "book_id": update_book_id },
        success: function(response) {
            $('#update-book-id').val(update_book_id);
            
            // fill out form values
            var details = jQuery.parseJSON(response);

            $('input:checkbox').prop('checked', false);

            $('#update-isbn').val(details.isbn);
            $('#update-title').val(details.title);

            var cover_path = "../assets/img/book-covers/" + details.book_cover;
            $("#current-cover").attr("src", cover_path);
            $("#current-book-cover").val(details.book_cover);

            details.authors_firstname.forEach(function (author_firstname, index) {
                $('#update-author-firstname-' + index).val(author_firstname);
            });

            details.authors_lastname.forEach(function (author_lastname, index) {
                $('#update-author-lastname-' + index).val(author_lastname);
            });

            $('#update-publisher').val(details.publisher);
            $('#update-year').val(details.publishing_year);
            
            details.categories.forEach(function (category, index) {
                $('.update-category#update-category-' + category).prop('checked', true);
            });

            $('#update-pages').val(details.pages);
            $('#update-summary').val(details.summary);
            $('#update-price').val(details.price);
            $('#update-stocks').val(details.stock);

            details.features.forEach(function (feature, index) {
                $('.update-feature#update-feature-' + feature).prop('checked', true);
            });
        },
    });
});


$("#update-book-btn").click(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../src/AdminPage/update_book_post.php',
        data: $('#update-book-form').serialize(),
        success: function(response) {
            $('.manage-book-response').html("Book updated successfully. Page reloading.");
            $('.manage-book-response').addClass("alert-success");
            $('.manage-book-response').show(); 

            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    })
});