$('.delete-user').click(function() {
    var user_id = $(this).attr('id').split("-")[1];
    var username = $(this).attr('username');

    $("#username").html(username);

    var delete_post = "../src/AdminPage/delete_user_post.php";
    
    $("#delete-user-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: delete_post,
            data: { "user_id": user_id, 
                    "user_name": username },
            success: function(response) {
                console.log(response);
                
                if (response == "customer 0 user 0" || response == "user 0") {
                    $("#deleteuser-response").html("User deleted successfully. <br> Reloading the page.");
                    $("#deleteuser-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#deleteuser-response").html(response + "<br> Reloading the page.");
                    $("#deleteuser-response").addClass("alert-danger");

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

    var update_post = "../src/AdminPage/update_user_post.php";
    
    $("#update-user-btn").click(function() {
        $.ajax({
            type: 'POST',
            url: update_post,
            data: { "user_id": user_id },
            success: function(response) {
                console.log(response);

            },
        });
    });
});