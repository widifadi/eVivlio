var book_title = $('.book').attr('id');
console.log(book_title)

function loadBookDetails() {
    $.ajax({
        url: 'book.php',
        method: 'GET',
        data: book_title,
        success: function(data) {
            // replace book list with book detail
            // $("#book-list").replace(data);
            $('#book-list').load('../../src/Catalogue/book.php');
        }
    })
}