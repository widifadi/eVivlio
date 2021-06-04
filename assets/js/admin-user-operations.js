$('.delete-user').click(function() {
    var user_id = $(this).attr('id').split("-")[1];
    var customer_id = $(this).attr('customer-id');
    var username = $(this).attr('username');

    $("#username").html(username);

    var delete_post = "../src/AdminPage/delete_user_post.php";
    
    $("#delete-user-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: { "user_id": user_id, 
                    "customer_id": customer_id },
            success: function(response) {
                if (response == "00") {
                    $(".deleteuser-response").html("User deleted successfully. <br> Reloading the page.");
                    $(".deleteuser-response").addClass("alert-success");
                    $(".deleteuser-response").show();

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $(".deleteuser-response").html(response + "<br> Reloading the page.");
                    $(".deleteuser-response").addClass("alert-danger");
                    $(".deleteuser-response").show();

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
        });
    });
});


$('.update-user').click(function() {
    var user_id = $(this).attr('id').split("-")[1];
    var username = $(this).attr('username');
    var customer_id = $(this).attr('customer-id');
    var admin_permission = $(this).attr('admin-permission');
    
    $('input:checkbox').prop('checked', false);

    $("#update-userid").val(user_id);
    $("#update-username").val(username);
    $("#update-customerid").val(customer_id);

    if (admin_permission == 1) {
        $("#update-permission").prop('checked', true);
    } else if (admin_permission == 0){
        $("#update-permission").prop('checked', false);
    }

});