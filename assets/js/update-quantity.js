$(".itemQty").on('change',function() {
    var $el = $(this).closest('input');
    var bid = $el.find('bid');
    var bprice = $el.find('bprice')
    var quantity = $(this).attr('value').split("-")[1];

    //location.reload(true); the code below will not executed

    $.ajax({
        type: 'POST',
        url: '../src/Cart/update_cart.php',
        data: { "book_id" : bid, "price" : bprice, "quantity": quantity },
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