<?php 
require_once "./functions/database_functions.php";
include ('regprocess.php');

/* session_start();
 $errors = array();
 $db = mysqli_connect('localhost','root','','www_project') or die("Couldn't connect to database");
if (isset($_POST['reg_button'])){
*/
?>
<!DOCTYPE html>
<html>
<head>
 <title> Registration </title>
 
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Page_Style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php include'navigation-bar.php'; ?>


<div>
     <form action="regprocess.php" method="post">
              

          <div class="container">
               
                         <div class="header">
                              <h2> Customer Register </h2>
                         </div>
                    

                    <div class="Row">
                    
                              <div class="col-sm-3">

                                    

                              <div>
                                                  <label for="Fname">First Name : </label>
                                                  <input class="form-control" type="text" name="Fname" required>      
                                        </div>

                                        <div>
                                                  <label for="Lname">Last Name : </label>
                                                  <input class="form-control" type="text" name="Lname" required>      
                                        </div>

                                             <div>
                                             
                                                  <label for="email"> Email : </label>
                                                  <input class="form-control" type="email" name="email" required>
                                                  
                                             </div>

                                             <div>
                                             
                                                  <label for="username"> User id : </label>
                                                  <input  class="form-control" type="text" name="username" required>
                                                  
                                             </div>

                                             
                                             <div>

                                                  <label for="password">Password : </label>
                                                  <input class="form-control" type="password" name="password" required>
                                             
                                             
                                             </div>

                                             <div>

                                                  <label for="password_check">Confirm Password : </label>
                                                  <input class="form-control" type="password" name="password_check"require>
                                                  </div>

                                             <div>
                                             
                                                  <label for="contact "> Contact Number : </label>
                                                  <input class="form-control" type="text" name="contact" required>
                                                  
                                             </div>

                                             <div>

                                                  <label for="Address"> Address: </label>
                                                  <input class="form-control" type="text" name="address" required>
                                                  
                                             </div>
                                             <div>

                                                  <label for="city"> City: </label>
                                                  <input class="form-control" type="text" name="city" required>
                                                  
                                             </div>


                                              <div>

                                                  <label for="zipcode"> Zip-Code: </label>
                                                  <input class="form-control" type="text" name="zipcode" required>
                                                  
                                             </div>

                                             <div>

                                                  <label for="country"> Country: </label>
                                                  <input class="form-control" type="text" name="country" required>
                                                  
                                             </div>

                                             <hr class="mb-3">
                                             <button class="btn btn-primary" type="submit" name="reg_button"> Submit </button> 
                                            
                                     </div>  


                               </div>  

                      </div>   

                      
                </div>

                <p> Already a User ?<a href="login.php"> Login here </a></p>                      


          </div>
     </form>                
</div>
</body>

</html>