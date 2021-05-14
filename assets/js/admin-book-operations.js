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

            $('#update-isbn').val(details.isbn);
            $('#update-title').val(details.title);
            // TODO cover
            // TODO author
            $('#update-author1-firstname').val(details.author_fname);
            $('#update-author1-lastname').val(details.author_lname);
            $('#update-publisher').val(details.publisher);
            $('#update-year').val(details.publishing_year);
            // TODO category
            console.log(details.category);

            $('#update-pages').val(details.pages);
            $('#update-summary').val(details.summary);
            $('#update-price').val(details.price);
            $('#update-stocks').val(details.stock);
            // TODO feature            

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