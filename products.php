<?php
session_start();
include './mycon.php';
$c_name="";
$q="";
                     if(isset($_REQUEST['c_name']))
                     {
                         $c_name=$_REQUEST['c_name'];
                         $q="select * from pro_info where p_category='$c_name'";
                     }
                     else
                     {
                         $q="select * from pro_info";
                     }
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>FOoDy | Products</title>
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
         <?php include './user_header.php'; ?>
      </nav>
      <section class="breadcrumb-osahan pt-5 pb-5 bg-dark position-relative text-center">
         <h1 class="text-white">Offers Near You for <?php echo $c_name;?></h1>
         <h6 class="text-white-50">Best deals at your favourite restaurants</h6>
      </section>
      <section class="section pt-5 pb-5 products-listing">
         <div class="container">
            <div class="row d-none-m">
               <div class="col-md-12">
                  <div class="dropdown float-right">
                     <a class="btn btn-outline-info dropdown-toggle btn-sm border-white-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sort by: <span class="text-theme">Distance</span> &nbsp;&nbsp;
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 ">
                        <a class="dropdown-item" href="#">Distance</a>
                        <a class="dropdown-item" href="#">No Of Offers</a>
                        <a class="dropdown-item" href="#">Rating</a>
                     </div>
                  </div>
                 
               </div>
            </div>
            <div class="row">
               
               <div class="col-md-12">
                  <div class="owl-carousel owl-carousel-category owl-theme list-cate-page mb-4">
                     <?php
                     $q2="select * from categories";
                     $re2=$con->query($q2);
                     while($r2=$re2->fetch_assoc())
                     {
                         ?>
                      <div class="item">
                        <div class="osahan-category-item">
                            <a href="products.php?c_name=<?php echo $r2['c_name'];?>">
                               <img class="img-fluid" src="admin/pics/products/<?php echo $r2['c_pic'];?>" alt="">
                              <h6><?php echo $r2['c_name'];?></h6>
                              
                           </a>
                        </div>
                     </div>
                      <?php
                     }
                     ?>
                      
                     
                  </div>
                  <div class="row">
                     <?php
                     
                     $re=$con->query($q);
                     while($r=$re->fetch_assoc())
                     {
                         $price = $r['p_price'];
                         $offer = $r['p_offer'];
                         $total = ceil(($price-($price*$offer/100)));
                         ?>
                      <div class="col-md-4 col-sm-6 mb-4 pb-2">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                           <div class="list-card-image">
                               <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> <?php echo $r['p_offer']; ?>%</span></div>
                               <div class="favourite-heart text-danger position-absolute"><a href="products_detail.php"><i class="icofont-heart"></i></a></div>
                              <div class="member-plan position-absolute"><span class="badge badge-dark"><?php echo $r['p_category']; ?></span></div>
                              <a href="products_detail.php?rid=<?php echo $r['r_id'];?>&pid=<?php echo $r['pid'];?>&p_category=<?php echo $r['p_category'];?>">
                                  <img src="admin/pics/products/<?php echo $r['p_pic'];?>" class="img-fluid item-img"  style="height: 250px;width: 400px;">
                              </a>
                           </div>
                           <div class="p-3 position-relative">
                              <div class="list-card-body">
                                 <h6 class="mb-1"><a href="detail.html" class="text-black"><?php echo $r['r_name']; ?></a></h6>
                                 <p class="text-gray mb-3"><?php echo $r['r_about']; ?></p>
                                 <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 20–25 min</span> <span class="float-right text-black-50"> <del>&#8377;<?php echo $price;?></del>  | &#8377;<?php echo $total;?>/-</span></p>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                      <?php
                     }
                            
                     ?>
                     
                     
                     <div class="col-md-12 text-center load-more">
                        <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>  
                     </div>
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