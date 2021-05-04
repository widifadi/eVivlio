<?php
  require_once "./functions/database_functions.php";
  ?>

<!DOCTYPE html>
<html>
<head>
 <title> Customer Login </title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Page_Style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include'navigation-bar.php'; ?>
<div> 

  <form action="login_verify.php" method="post">

<!--    <?php include('errors.php') ?> -->

    <div class="container">


        <div class="header">

        <h2> Customer Log In </h2>

        </div>

           
      <div class="Row">
                    
        <div class="col-sm-3">

            <div>
                          <label for="username"> User id : </label>
                          <input class="form-control" type="text" name="username" required>
            </div>
                    

            <div>
                            <label for="password">Password : </label>
                            <input class="form-control" type="password" name="password" required>
            </div>


                          <hr class="mb-3">
                         <button class="btn btn-primary" type="submit" name="log_button"> Log In </button> 
                         <p> Not a User ?<a href="registration.php"> Register here </a></p>
                    
        </div>                         

      </div>
                         
     </div>
   
  </form>  
  
</div>
          
</body>

</html> 