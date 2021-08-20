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
      <title>Login</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">
      <!-- Font Awesome-->s
      <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
      <!-- Select2 CSS-->
      <link href="vendor/select2/css/select2.min.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/osahan.css" rel="stylesheet">
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
           if(isset($_SESSION['fail']))
           {
               ?>
                   alert("<?php echo $_SESSION['fail']; ?>");
                   <?php 
               unset($_SESSION['fail']);
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
                           <h3 class="login-heading mb-4">Login Here!</h3>
                           <form action="login_data.php" method="post">
                              <div class="form-label-group">
                                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;">
                                 <label for="inputEmail">Email address</label>
                              </div>
                              <div class="form-label-group">
                                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required"  style="font-weight: bold;color: darkblue;font-style: italic;font-size: large;">
                                 <label for="inputPassword">Password</label>
                              </div>
                               <input type="radio" name="role" value="User" checked="checked"/> User
                               <input type="radio" name="role" value="Restaurant"/> Restaurant
                               <input type="radio" name="role" value="Admin"/> Admin
                               <br/>
                               <br/>
                               
                               <input type="submit" class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2"  value="Sign In"/>
                              <div class="text-center pt-3">
                                  Don’t have an account? <a class="font-weight-bold" href="register.php">Sign Up</a>
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