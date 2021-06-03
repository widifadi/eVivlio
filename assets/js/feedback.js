$("#btn_feedback").click(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../src/ContactUs/feedback_post.php',
        data: $('#feedback-form').serialize(),
        success: function(response) {
            $("#fb-text").html("<strong> Thank you for submitting your feedback! We will process it within 3 days. </strong>");

            setTimeout(function() {
                location.reload();
            }, 2000);
        }
    })
});
