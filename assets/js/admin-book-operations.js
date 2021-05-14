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
                    $("#delete-response").html("Book deleted successfully. <br> Reloading the page.");
                    $("#delete-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#delete-response").html(response + "<br> Reloading the page.");
                    $("#delete-response").addClass("alert-danger");

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

    var update_book_get = "../src/AdminPage/update_book_get.php";
    var update_book_post = "../src/AdminPage/update_book_post.php"; 

    // GET book details
    $.ajax({
        type: 'GET',
        url: update_book_get,
        data: { "book_id": update_book_id },
        success: function(response) {
            // fill out form values
            var details = jQuery.parseJSON(response);
            $('input:checkbox').prop('checked', false);

            $('#update-isbn').val(details.isbn);
            $('#update-title').val(details.title);

            // TODO cover
            var cover_path = "../assets/img/book-covers/" + details.book_cover;
            $("#update-cover").attr("src", cover_path);
            console.log(cover_path);

            // TODO author
            $('#update-author1-firstname').val(details.author_fname);
            $('#update-author1-lastname').val(details.author_lname);
            $('#update-publisher').val(details.publisher);
            $('#update-year').val(details.publishing_year);
            
            // categories
            details.category.forEach(function (category, index) {
                $('.update-category#' + category).prop('checked', true);
            });

            $('#update-pages').val(details.pages);
            $('#update-summary').val(details.summary);
            $('#update-price').val(details.price);
            $('#update-stocks').val(details.stock);

            // feature  
            details.features.forEach(function (feature, index) {
                $('.update-features#' + feature).prop('checked', true);
            });
          
        },
    });

    // POST updated book details
    $("#update-book-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: update_book_post,
            data: { "book_id": update_book_id },
            success: function(response) {

            },
        });
    });
});