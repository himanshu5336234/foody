<?php
session_start();
include './mycon.php';
$rid = $_REQUEST['rid'];
$query = "select * from restaurants where rid=$rid";
$re = $con->query($query);
if ($row = $re->fetch_assoc()) {
?>
   <!doctype html>
   <html lang="en">

   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title><?php echo $r['r_name']; ?></title>
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

   <body>
      <!-- Modal -->

      <!-- Modal -->

      <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
         <?php include './user_header.php'; ?>
      </nav>
      <section class="section pt-4 pb-4 osahan-account-page">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="osahan-account-page-left shadow-sm bg-white h-100">
                     <div class="border-bottom p-4">
                        <div class="osahan-user text-center">
                           <div class="osahan-user-media">
                              <img class="mb-3 rounded-pill shadow-sm mt-1" src="admin/pics/resto/<?php echo $row['r_pic']; ?>" alt="" style="width: 200px;height: 200px;">
                              <div class="osahan-user-media-body">
                                 <h6 class="mb-2"><?php echo $row['r_name'] ?></h6>
                                 <p class="mb-1"><?php echo $row['r_mobile'] ?></p>
                                 <p><?php echo $row['r_email'] ?></p>
                                 <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><?php echo $row['r_address'] ?></a></p>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
               <div class="col-md-9">
                  <div class=" shadow-sm bg-white p-4 h-100">
                     <div class="tab-content">


                        <div>
                           <h4 class="font-weight-bold mt-0 mb-4">Products of <?php echo $row['r_name']; ?></h4>
                           <div class="row">
                              <?php
                              $q1 = "select * from pro_info where r_id=$rid";
                              $re1 = $con->query($q1);
                              while ($row = $re1->fetch_assoc()) {
                                 $price = $row['p_price'];
                                 $offer = $row['p_offer'];
                                 $total = ceil(($price - ($price * $offer / 100)));
                              ?>
                                 <div class="col-md-4 col-sm-6 mb-4 pb-2">
                                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                       <div class="list-card-image">

                                          <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>
                                          <div class="member-plan position-absolute"><span class="badge badge-dark"><?php echo $row['p_status']; ?></span></div>
                                          <a href="products_detail.php?rid=<?php echo $row['r_id']; ?>&pid=<?php echo $row['pid']; ?>&p_category=<?php echo $row['p_category']; ?>">
                                             <img src="admin/pics/products/<?php echo $row['p_pic']; ?>" class="img-fluid item-img" style="height: 210px;width: 250px;">
                                          </a>
                                       </div>
                                       <div class="p-3 position-relative">
                                          <div class="list-card-body">
                                             <h6 class="mb-1"><a href="products_detail.php?rid=<?php echo $row['r_id']; ?>&pid=<?php echo $row['pid']; ?>&p_category=<?php echo $row['p_category']; ?>" class="text-black"><?php echo $row['p_name']; ?>
                                                </a>
                                             </h6>
                                             <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>
                                             <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–30 min</span> <span class="float-right text-black-50"> &#8377;<del><?php echo $price; ?></del> | <?php echo $total; ?></span></p>
                                          </div>
                                          <div class="list-card-badge">
                                             <span class="badge badge-danger">OFFER</span> <small> <?php echo $row['p_offer']; ?>% OFF</small>
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
            </div>
         </div>
      </section>
      <section class="section pt-5 pb-5 text-center bg-white">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
               </div>
            </div>
         </div>
      </section>

      <footer class="pt-4 pb-4 text-center">
         <?php include './footer.php'; ?>
      </footer>
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
<?php
} else {
   echo "Sorry Restaurant not found.";
}
?>