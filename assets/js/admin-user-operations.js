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
                
                // TODO 
                if (response == "customer 0 user 0" || response == "user 0") {
                    $("#delete-response").html("User deleted successfully. <br> Reloading the page.");
                    $("#delete-response").addClass("alert-success");

                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    $("#delete-response").html(response + "<br> Reloading the page.");
                    $("#delete-response").addClass("alert-danger");

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 2000);
                }
            },
        });
    });
});