<?php 
session_start();
include './mycon.php';
$pid = $_REQUEST['pid'];
$rid = $_REQUEST['rid'];
$category = $_REQUEST['p_category'];
$q1="select * from restaurants where rid=$rid";
$re1=$con->query($q1);
if($r1=$re1->fetch_assoc())
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
      <title><?php echo $category;?></title>
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
                               <img class="mb-3 rounded-pill shadow-sm mt-1" src="admin/pics/resto/<?php echo $r1['r_pic'];?>" alt="gurdeep singh osahan">
                              <div class="osahan-user-media-body">
                                 <h6 class="mb-2"><?php echo $r1['r_name'];?></h6>
                                 <p class="mb-1"><?php echo $r1['r_mobile'];?></p>
                                 <p><?php echo $r1['r_email'];?></p>
                                 <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3"   href="user_restaurant.php?rid=<?php echo $r1['rid'];?>">View All Products</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                           <h4 class="font-weight-bold mt-0 mb-4"><?php echo $category; ?></h4>
                          <?php  
                          $q2="select * from pro_info where r_id=$rid and p_category='$category'";
                          $re2=$con->query($q2);
                          while($r2=$re2->fetch_assoc())
                          {
                              $price = $r2['p_price'];
                         $offer = $r2['p_offer'];
                         $total = ceil(($price-($price*$offer/100)));
                              ?>
                           <form action="user_cart_save.php" method="post">
                               <input type="hidden" name="pid" value="<?php echo $pid;?>"/>
                               <input type="hidden" name="rid" value="<?php echo $rid;?>" />
                               <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>"/>
                               <input type="hidden" name="p_pic" value="<?php echo $r2['p_pic'];?>"/>
                               <input type="hidden" name="p_name" value="<?php echo $r2['p_name'];?>"/>
                               <input type="hidden" name="p_offer" value="<?php echo $r2['p_offer'];?>"/>
                               <input type="hidden" name="p_price" value="<?php echo $r2['p_price'];?>"/>
                               <input type="hidden" name="r_name" value="<?php echo $r1['r_name'];?>"/>
                               <input type="hidden" name="total" value="<?php echo $total;?>"/>
                            <div class="bg-white card mb-4 order-list shadow-sm">
                              <div class="gold-members p-4">
                                 <a href="#">
                                    <div class="media">
                                       <img class="mr-4 img-thumbnail img-fluid" src="admin/pics/products/<?php echo $r2['p_pic'];?>" alt="Generic placeholder image"/>
                                       <div class="media-body">
                                           <span class="float-right text-info"><input type="number" min="1" max="10" name="quantity" value="1" class="form-control"  style="font-weight: bold;font-size: large;color: darkblue;" /></span>
                                          <h6 class="mb-2">
                                              <a href="#" class="text-black"><?php echo $r2['p_name'];?></a>
                                 </h6>
                                 <p class="text-gray mb-1">&#8377; <?php echo $price;?> | <?php echo $total;?>/-
                                 </p>
                                 <p class="text-gray mb-3"><i class="icofont-list"></i> ORDER #<?php echo $r2['pid'];?> <i class="icofont-clock-time ml-2"></i> Mon, Nov 12, 6:26 PM</p>
                                 <p class="text-dark"><?php echo $r2['p_about']; ?>
                                 </p>
                                 <hr>
                                 <div class="float-right">
                                      
                                      <input type="submit" class="btn btn-sm btn-primary" value="Add Product" />
                                 </div>
                                 <p class="mb-0 text-black text-primary pt-2" id="total"><span class="text-black font-weight-bold"> Total Paid:</span>  &#8377;<?php echo $total;?>/-
                                 </p>
                                 </div>
                                 </div>
                                 </a>
                              </div>
                           </div>
                           </form>
                           <?php
                          }
                          ?>
                          
                           
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
                   <h5 class="m-0">Operate food store or restaurants? <a href="user_contact.php">Work With Us</a></h5>
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
}
else
{
    echo "Error : ".mysqli_error($con);
}
?>
}