$(".add-wishlist-btn").click(function(e) {
    var book_id = $(this).attr('id').split("-")[1];

    $.ajax({
        type: 'POST',
        url: 'wishlist php here for adding the data to repository',
        data: { "book_id": book_id },
        success: function(response) {
            console.log(response)
        }
    });
});