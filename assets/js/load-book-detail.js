function loadBookDetails() {
    $.ajax({
        url: 'book.php',
        method: GET,
        data: "<div></div>",
        success: function(data) {
            // replace book list with book detail
            $("#book-list").replace(data);
        }
    })
}