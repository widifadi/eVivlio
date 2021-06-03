$(".add-cart-btn").click(function(e) {
    e.preventDefault();
    var book_id = $(this).attr('id').split("-")[1];

    $.ajax({
        type: 'POST',
        url: '../src/Cart/add_cart.php',
        data: { "book_id": book_id },
        success: function(response) {
            $("#message").html(response).delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
            console.log(response)
        }
    });
});