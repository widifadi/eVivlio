$(".itemQty").on('change',function() {
    var $el = $(this).closest('div');
    var quantity = $el.find(".itemQty").val();
    var bid = $(this).attr('id');
    console.log(quantity);

    location.reload(true); //the code below will not executed??

    $.ajax({
        type: 'POST',
        url: '../src/Cart/update_cart.php',
        data: { "book_id" : bid, "quantity": quantity },
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