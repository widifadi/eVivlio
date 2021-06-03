$(".itemQty").click(function(e) {
    e.preventDefault();
    var quantity = $(this).attr('value').split("-")[1];
    location.reload(true);

    $.ajax({
        type: 'POST',
        url: '../src/Cart/update_cart.php',
        data: { "quantity": quantity },
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