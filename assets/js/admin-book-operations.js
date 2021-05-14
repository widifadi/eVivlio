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
        success: function(details) {
            // fill out form values
            console.log(details)
            $('#update-title').val("BookTitle");

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