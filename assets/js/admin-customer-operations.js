$('.delete-customer').click(function() {
    var customer_id = $(this).attr('id').split("-")[1];
    var user_name = $(this).attr('username');
    var first_name = $(this).attr('first-name');
    var last_name = $(this).attr('last-name');

    $("#first_name").html(first_name);
    $("#last_name").html(last_name);

    var delete_post = "../src/AdminPage/delete_customer_post.php";
    
    $("#delete-customer-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: { "customer_id": customer_id,
                    "username": user_name },
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