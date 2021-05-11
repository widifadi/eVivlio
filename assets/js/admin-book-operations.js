$('.delete-book').click(function() {
    var book_id = $(this).attr('id').split("-")[1];
    // TODO title special characters
    var book_title = $(this).attr('title');

    $("#book-title").html(book_title);

    var delete_post = "../src/AdminPage/delete_book_post.php";
    
    $("#delete-book-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: {"book_id": book_id },
            success: function(response) {
                console.log(response);
                if (response == 0) {
                    $("#delete-response").html("Book deleted successfully. <br> Reloading the page.");
                    $("#delete-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#delete-response").html(response);
                    $("#delete-response").addClass("alert-danger");
                }

            },
          });
    });
});