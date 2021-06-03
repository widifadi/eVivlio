$(".add-wishlist-btn").click(function(e) {
    e.preventDefault();
    var book_id = $(this).attr('id').split("-")[1];

    $.ajax({
        type: 'POST',
        url: '../src/MyPage/wishlist_button.php',
        data: { "book_id": book_id },
        success: function(response) {
            $("#message").html(response); 
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
            
            /*window.setTimeout(function(){
                $("#success-alert").alert('close');
            },2000);*/  
            console.log(response)
        }
    });
});