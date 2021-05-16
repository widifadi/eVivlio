$('.delete-order').click(function() {
    var order_id = $(this).attr('id').split("-")[1];

    $("#order-number").html(order_id);

    var delete_order = "../src/AdminPage/delete_order_post.php";
    
    $("#delete-order-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_order,
            data: { "order_id": order_id },
            success: function(response) {
                
                if (response == "0") {
                    $("#delete-order-response").html("Order deleted successfully. <br> Reloading the page.");
                    $("#delete-order-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#delete-order-response").html(response + "<br> Reloading the page.");
                    $("#delete-order-response").addClass("alert-danger");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
        });
    });
});


$('.update-order').click(function() {
    var order_id = $(this).attr('id').split("-")[1];

    var update_order_get = "../src/AdminPage/update_order_get.php";

    $.ajax({
        type: 'GET',
        url: update_order_get,
        data: { "order_id": order_id },
        success: function(response) {
            var details = jQuery.parseJSON(response);

            $('#update-orderid').val(order_id);
            $('#update-ordercustomer').val(details.customer_id);
            $('#update-orderdate').val(details.order_date);
            $('#update-shipping').val(details.shipping_status);

        },
    });

});