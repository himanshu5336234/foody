<?php
session_start();
include './mycon.php';
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>FOoDy</title>
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
      <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
         <?php include_once './header.php'; ?>
      </nav>
      <section class="pt-5 pb-5 homepage-search-block position-relative">
         <div class="banner-overlay"></div>
         <div class="container">
            <div class="row d-flex align-items-center">
               <div class="col-md-8">
                  <div class="homepage-search-title">
                     <h1 class="mb-2 font-weight-normal"><span class="font-weight-bold">Find Awesome Deals</span> in Your City</h1>
                     <h5 class="mb-5 text-secondary font-weight-normal">Lists of top restaurants, cafes, pubs, and bars </h5>
                  </div>
                  <div class="homepage-search-form">
                     <form class="form-noborder">
                        <div class="form-row">
                           
                           <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                               <select name="r_name" class="form-control form-control-lg" >
                                  <option>Enter your favorit Restaurant</option>
                                  <?php
                                  $q4="select * from restaurants";
                                  $re4=$con->query($q4);
                                  while($r4=$re4->fetch_assoc())
                                  {
                                      ?>
                                  <option><?php echo $r4['r_name'];?></option>
                                  <?php
                                  }
                                  ?>
                              </select>
                              
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                               <input type="submit" class="btn btn-primary btn-block btn-lg btn-gradient" value="Search"/>
                              <!--<button type="submit" class="btn btn-primary btn-block btn-lg btn-gradient">Search</button>-->
                           </div>
                        </div>
                     </form>
                  </div>
                  <h6 class="mt-4 text-shadow font-weight-normal">E.g. Beverages, Pizzas, Chinese, Bakery, Indian...</h6>
                  <div class="owl-carousel owl-carousel-category owl-theme">
                     <?php
                     $q2="select * from categories";
                     $re2=$con->query($q2);
                     while($r2=$re2->fetch_assoc())
                     {
                         ?>
                      <div class="item">
                        <div class="osahan-category-item">
                            <a href="login.php">
                               <img class="img-fluid" src="admin/pics/products/<?php echo $r2['c_pic'];?>" alt="">
                              <h6><?php echo $r2['c_name'];?></h6>
                              <p>156</p>
                           </a>
                        </div>
                     </div>
                      <?php
                     }
                     ?>
                   
                   
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="osahan-slider pl-4 pt-3">
                     <div class="owl-carousel homepage-ad owl-theme">
                        <?php
                        $q3="select * from restaurants";
                        $re3=$con->query($q3);
                        while($r3=$re3->fetch_assoc())
                        {
                            ?>
                         <div class="item">
                             <a href="login.php"><img class="img-fluid rounded" src="admin/pics/resto/<?php echo $r3['r_pic'];?>"  style="height: 300px;"></a>
                        </div>
                         <?php
                        }
                        ?>
                        
                     </div>
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











