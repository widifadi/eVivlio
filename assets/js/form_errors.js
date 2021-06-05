$("#login-btn").click(function(e) {
  e.preventDefault();

  $.ajax({
      type: 'POST',
      url: '../src/SignupLogin/verify_login.php',
      data: $('#login-form').serialize(),
      success: function(response) {
          $('.login-btn-response').html("Password not identified.");
          $('.login-btn-response').addClass("alert-success");
          $('.login-btn-response').show(); 

          setTimeout(function() {
              location.reload();
          }, 10000);
      }
  })
});


