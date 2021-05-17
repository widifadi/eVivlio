$('.delete-customer').click(function() {
    var customer_id = $(this).attr('id').split("-")[1];
    var first_name = $(this).attr('first-name');
    var last_name = $(this).attr('last-name');

    $("#first_name").html(first_name);
    $("#last_name").html(last_name);

    var delete_post = "../src/AdminPage/delete_customer_post.php";
    
    $("#delete-customer-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: { "customer_id": customer_id },
            success: function(response) {
                console.log(response);
                
                if (response == "0") {
                    $("#deletecustomer-response").html("User deleted successfully. <br> Reloading the page.");
                    $("#deletecustomer-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#deletecustomer-response").html(response + "<br> Reloading the page.");
                    $("#deletecustomer-response").addClass("alert-danger");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
        });
    });
});


$('.update-customer').click(function() {
    var update_customer_id = $(this).attr('id').split("-")[1];

    var update_customer_get = "../src/AdminPage/update_customer_get.php";

    // GET book details
    $.ajax({
        type: 'GET',
        url: update_customer_get,
        data: { "customer_id": update_customer_id },
        success: function(response) {
            var details = jQuery.parseJSON(response);

            $('#update-customer-id').val(update_customer_id);
            $('#update-firstName').val(details.first_name);
            $('#update-lastName').val(details.last_name);
            $('#update-email').val(details.email);
            $('#update-birthdate').val(details.birthday);
            $('#update-phone').val(details.phone);
            $('#update-address').val(details.address);
            $('#update-city').val(details.city);
            $('#update-state').val(details.state);
        },
    });

});