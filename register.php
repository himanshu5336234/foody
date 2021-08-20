<?php
session_start();
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>FOoDy | Registration</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
      <!-- Select2 CSS-->
      <link href="vendor/select2/css/select2.min.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/osahan.css" rel="stylesheet">
      <link rel="stylesheet" href="css/index.css">
   </head>
   <body class="bg-white">
       <script type="text/javascript">
           <?php  
           if(isset($_SESSION['u_s']))
           {
               ?>
                   alert("<?php echo $_SESSION['u_s']; ?>");
                   <?php 
               unset($_SESSION['u_s']);
           }
           ?>
           </script>
      <div class="container-fluid">
         <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
               <div class="login d-flex align-items-center py-5">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto pl-5 pr-5">
                           <h3 class="login-heading mb-4">New Buddy!</h3>
                           <form  action="register_save.php" method="post">
                               <div class="form-label-group mb-4">
                                   <input type="text" id="name" class="form-control" placeholder="Name" name="name"  required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;"/>
                                 <label for="name">User Name</label>
                              </div>
                               <div class="form-label-group mb-4">
                                   <input type="text" id="mobile" class="form-control" placeholder="Mobile Number" name="mobile" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;"/>
                                 <label for="mobile">Mobile</label>
                              </div>
                              <div class="form-label-group">
                                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;"/>
                                 <label for="inputEmail">Email address</label>
                              </div>
                              <div class="form-label-group">
                                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;"/>
                                 <label for="inputPassword">Password</label>
                              </div>
                              
                              <div class="form-label-group mb-4">
                                  <select name="city" class="form-control" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;" >
                                      <option>Aligarh</option>
                                  </select>
                                 
                              </div>
                               <input type="submit" class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2"   value="Sign Up"/>
                              <div class="text-center pt-3">
                                  Already have an Account? <a class="font-weight-bold" href="login.php">Sign In</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="vendor/jquery/jquery-3.3.1.slim.min.js"></script>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Select2 JavaScript-->
      <script src="vendor/select2/js/select2.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>