<?php
session_start();
$city = $_SESSION['city'];
include './mycon.php';
$uid = $_SESSION['uid'];
$q="select * from users where uid=$uid";
$re=$con->query($q);
if($r=$re->fetch_assoc())
{
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Hi <?php echo $_SESSION['name'];?></title>
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
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
      <link rel="stylesheet" href="css/index.css">
   </head>
   <body>
       <script type="text/javascript">
       <?php
       if(isset($_SESSION['user_update']))
       {
           ?>
               alert("<?php echo $_SESSION['user_update'];?>");
               <?php
           unset($_SESSION['user_update']);
       }
       ?>
       </script>
      <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
         <?php include_once './user_header.php'; ?>
      </nav>
      <section class="pt-5 pb-5 homepage-search-block position-relative">
         <div class="banner-overlay"></div>
         <div class="container">
            <div class="row d-flex align-items-center">
               <div class="col-md-8">
                  <div class="homepage-search-title">
                     <h2 class="mb-2 font-weight-normal"><span class="font-weight-bold">About</span> <?php echo $r['name'];?></h2>
                     <form action="user_update_data.php" method="post">
                          <table class="table">
                              <tr>
                                  <td>User Name<br/>
                                      <input type="text" name="name" value="<?php echo $r['name'];?>" required="required" class="form-control"  style="color: darkblue;font-weight: bold;font-size: large;"/>
                                  </td>
                                  <td>Mobile<br/>
                                      <input type="text" name="mobile" maxlength="10" required="required" class="form-control" value="<?php echo $r['mobile'];?>" style="color: darkblue;font-weight: bold;font-size: large;"/>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Email<br/>
                                      <input type="email" name="email" value="<?php echo $r['email'];?>" class="form-control" required="required" style="color: darkblue;font-weight: bold;font-size: large;"/>
                                  </td>
                                  <td>Password<br/>
                                      <input type="text" name="password" value="<?php echo $r['password'];?>" class="form-control" style="color: darkblue;font-weight: bold;font-size: large;"/>
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="2">Delivery Address<br/>
                                      <textarea name="address" class="form-control" required="required" style="color: darkblue;font-weight: bold;font-size: large;"><?php echo $r['address'];?></textarea>
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="2">
                                      <input type="submit" value="Update Information" class="btn btn-primary"/>
                                  </td>
                              </tr>
                          </table>
                      </form>
                  </div>
                  
                  
               </div>
               <div class="col-md-4">
                  <div class="osahan-slider pl-4 pt-3">
                      <img src="admin/pics/users/<?php echo $r['pic'];?>" style="width: 300px;height: 300px;" class="img-fluid img-thumbnail"/>
                      <form action="user_update_pic.php" method="post" enctype="multipart/form-data">
                          <table class="table">
                              <tr>
                                  <td><input type="file" name="pic" class="form-control" required="required"/></td>
                              </tr>
                              <tr>
                                  <td><input type="submit" value="Update Image" class="btn btn-primary"/></td>
                              </tr>
                          </table>
                      </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
     
      <footer class="pt-4 pb-4 text-center">
         <?php include_once './footer.php'; ?>
      </footer>
      <!-- jQuery -->
      <script src="vendor/jquery/jquery-3.3.1.slim.min.js"></script>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Select2 JavaScript-->
      <script src="vendor/select2/js/select2.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>
<?php
}
else
{
    echo "Sorry data not found.";
}
?>