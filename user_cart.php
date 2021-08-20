<?php
session_start();
include './mycon.php';
$order_id=$_SESSION['order_id'];
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $q3="delete from cart where id=$id";
    $con->query($q3);
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
      <title>Cart</title>
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
       if(isset($_SESSION['cart_save']))
       {
           ?>
               alert("<?php echo $_SESSION['cart_save'];?>");
               <?php
           unset($_SESSION['cart_save']);
       }
       ?>
       </script>
      <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
         <?php include './user_header.php'; ?>
      </nav>
     <?php
     $uid=$_SESSION['uid'];
     $order_id=$_SESSION['order_id'];
     $q1="select count(*) as 'total_item' from cart where uid=$uid and order_id='$order_id'";
     $re1=$con->query($q1);
     $t=0;
     if($r1=$re1->fetch_assoc())
     {
        $t=$r1['total_item'];   
     }
     if($t<=0)
     {
         ?>
       <section class="section pt-5 pb-5 osahan-not-found-page">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center pt-5 pb-5">
                  <img class="img-fluid" src="img/404.png" alt="404">
                  <h1 class="mt-2 mb-2">Cart is Empty</h1>
                  <p>Uh-oh! Looks like the page you are trying to access, doesn't <br>exist. Please start afresh.</p>
                  <a class="btn btn-primary btn-lg" href="home.php">GO HOME</a>
               </div>
            </div>
         </div>
      </section>
       <?php
     }
     else
     {
         ?>
        <section class="offer-dedicated-body mt-4 mb-4 pt-2 pb-2">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="offer-dedicated-body-left">
                     
                     <div class="bg-white rounded shadow-sm p-4 osahan-payment">
                        <h4 class="mb-1">Choose payment method</h4>
                        <h6 class="mb-3 text-black-50">Credit/Debit Cards</h6>
                        <div class="row">
                           <div class="col-sm-4 pr-0">
                              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                 <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="icofont-credit-card"></i> Credit/Debit Cards</a>
                                 <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="icofont-id-card"></i> Food Cards</a>
                                 <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="icofont-card"></i> Credit</a>
                                 <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="icofont-bank-alt"></i> Netbanking</a>
                                 <a class="nav-link" id="v-pills-cash-tab" data-toggle="pill" href="#v-pills-cash" role="tab" aria-controls="v-pills-cash" aria-selected="false"><i class="icofont-money"></i> Pay on Delivery</a>
                              </div>
                           </div>
                           <div class="col-sm-8 pl-0">
                              <div class="tab-content h-100" id="v-pills-tabContent">
                                 <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h6 class="mb-3 mt-0 mb-3">Add new card</h6>
                                    <p>WE ACCEPT <span class="osahan-card">
                                       <i class="icofont-visa-alt"></i> <i class="icofont-mastercard-alt"></i> <i class="icofont-american-express-alt"></i> <i class="icofont-payoneer-alt"></i> <i class="icofont-apple-pay-alt"></i> <i class="icofont-bank-transfer-alt"></i> <i class="icofont-discover-alt"></i> <i class="icofont-jcb-alt"></i>
                                       </span>
                                    </p>
                                    <form>
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <label for="inputPassword4">Card number</label>
                                             <div class="input-group">
                                                 <input type="number"  required="required" class="form-control" placeholder="Card number">
                                                <div class="input-group-append">
                                                   <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-card"></i></button>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-8">
                                             <label>Valid through(MM/YY)
                                             </label>
                                             <input type="number" required="required" class="form-control" placeholder="Enter Valid through(MM/YY)">
                                          </div>
                                          <div class="form-group col-md-4">
                                             <label>CVV
                                             </label>
                                             <input type="number" required="required" class="form-control" placeholder="Enter CVV Number">
                                          </div>
                                          <div class="form-group col-md-12">
                                             <label>Name on card
                                             </label>
                                             <input type="text" required="required" class="form-control" placeholder="Enter Card number">
                                          </div>
                                          <div class="form-group col-md-12">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Securely save this card for a faster checkout next time.</label>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-12 mb-0">
                                             <a href="#" class="btn btn-success btn-block btn-lg">PAY $1329
                                             <i class="icofont-long-arrow-right"></i></a>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h6 class="mb-3 mt-0 mb-3">Add new food card</h6>
                                    <p>WE ACCEPT  <span class="osahan-card">
                                       <i class="icofont-sage-alt"></i> <i class="icofont-stripe-alt"></i> <i class="icofont-google-wallet-alt-1"></i>
                                       </span>
                                    </p>
                                    <form>
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <label for="inputPassword4">Card number</label>
                                             <div class="input-group">
                                                <input type="number" required="required" class="form-control" placeholder="Card number">
                                                <div class="input-group-append">
                                                   <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-card"></i></button>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-8">
                                             <label>Valid through(MM/YY)
                                             </label>
                                             <input type="number" required="required" class="form-control" placeholder="Enter Valid through(MM/YY)">
                                          </div>
                                          <div class="form-group col-md-4">
                                             <label>CVV
                                             </label>
                                             <input type="number" required="required" class="form-control" placeholder="Enter CVV Number">
                                          </div>
                                          <div class="form-group col-md-12">
                                             <label>Name on card
                                             </label>
                                             <input type="text" required="required" class="form-control" placeholder="Enter Card number">
                                          </div>
                                          <div class="form-group col-md-12">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Securely save this card for a faster checkout next time.</label>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-12 mb-0">
                                             <a href="#" class="btn btn-success btn-block btn-lg">PAY $1329
                                             <i class="icofont-long-arrow-right"></i></a>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <div class="border shadow-sm-sm p-4 d-flex align-items-center bg-white mb-3">
                                       <i class="icofont-apple-pay-alt mr-3 icofont-3x"></i>
                                       <div class="d-flex flex-column">
                                          <h5 class="card-title">Apple Pay</h5>
                                          <p class="card-text">Apple Pay lets you order now & pay later at no extra cost.</p>
                                          <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>
                                       </div>
                                    </div>
                                    <div class="border shadow-sm-sm p-4 d-flex bg-white align-items-center mb-3">
                                       <i class="icofont-paypal-alt mr-3 icofont-3x"></i>
                                       <div class="d-flex flex-column">
                                          <h5 class="card-title">Paypal</h5>
                                          <p class="card-text">Paypal lets you order now & pay later at no extra cost.</p>
                                          <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>
                                       </div>
                                    </div>
                                    <div class="border shadow-sm-sm p-4 d-flex bg-white align-items-center">
                                       <i class="icofont-diners-club mr-3 icofont-3x"></i>
                                       <div class="d-flex flex-column">
                                          <h5 class="card-title">Diners Club</h5>
                                          <p class="card-text">Diners Club lets you order now & pay later at no extra cost.</p>
                                          <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <h6 class="mb-3 mt-0 mb-3">Netbanking</h6>
                                    <form>
                                       <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-outline-primary active">
                                          <input type="radio" name="options" id="option1" autocomplete="off" checked> HDFC <i class="icofont-check-circled"></i>
                                          </label>
                                          <label class="btn btn-outline-primary">
                                          <input type="radio" name="options" id="option2" autocomplete="off"> ICICI <i class="icofont-check-circled"></i>
                                          </label>
                                          <label class="btn btn-outline-primary">
                                          <input type="radio" name="options" id="option3" autocomplete="off"> AXIS <i class="icofont-check-circled"></i>
                                          </label>
                                       </div>
                                       <hr>
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <label>Select Bank
                                             </label>
                                             <br>
                                             <select class="custom-select form-control">
                                                <option selected>Bank</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                             </select>
                                          </div>
                                          <div class="form-group col-md-12 mb-0">
                                             <a href="#" class="btn btn-success btn-block btn-lg">PAY $1329
                                             <i class="icofont-long-arrow-right"></i></a>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="tab-pane fade" id="v-pills-cash" role="tabpanel" aria-labelledby="v-pills-cash-tab">
                                    <h6 class="mb-3 mt-0 mb-3">Cash</h6>
                                    <p>Please keep exact change handy to help us serve you better</p>
                                    <hr>
                                    <form>
                                       <a href="#" class="btn btn-success btn-block btn-lg">PAY $1329
                                       <i class="icofont-long-arrow-right"></i></a>
                                 </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item">
                     <div class="d-flex mb-4 osahan-cart-item-profile">
                        <img class="img-fluid mr-3 rounded-pill" alt="osahan" src="img/2.jpg">
                        <div class="d-flex flex-column">
                           <h6 class="mb-1 text-white">My Cart
                           </h6>
                           <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>
                        </div>
                     </div>
                     <div class="bg-white rounded shadow-sm mb-2">
                        <?php
                        $q="select * from cart where order_id='$order_id'";
                        $re=$con->query($q);
                        $sum=0;
                        while($r=$re->fetch_assoc())
                        {
                            $total = $r['p_amount'];
                            $quantity=$r['quantity'];
                            $total_amount = $total*$quantity;
                            $sum+=$total_amount;
                            ?>
                         <div class="gold-members p-2 border-bottom">
                             <p class="text-gray mb-0 float-right ml-2">&#8377; <?php echo $total_amount;?>/- <a href="user_cart.php?id=<?php echo $r['id'];?>">(Remove)</a></p>
                           
                           <div class="media">
                              <div class="mr-2"><span class="count-number float-right">
                           <input class="count-number-input" type="text" value="<?php echo $r['quantity'];?>" readonly="">
                           </span></div>
                              <div class="media-body">
                                 <p class="mt-1 mb-0 text-black"><?php echo $r['p_name'];?> (<?php echo $total;?>/-)</p>
                              </div>
                           </div>
                        </div>
                         <?php
                        }
                        ?>
                        
                     </div>
                      <form action="user_order_save.php" method="post">
                          <input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>
                     <div class="mb-2 bg-white rounded p-2 clearfix">
                        
                        <div class="input-group mb-0">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icofont-comment"></i></span>
                           </div>
                            <textarea class="form-control" placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" name="message"></textarea>
                        </div>
                     </div>
                     <div class="mb-2 bg-white rounded p-2 clearfix">
                        <p class="mb-1">Item Total Amount <span class="float-right text-dark"><?php echo $sum;?>/-</span></p>
                        <p class="mb-1">Restaurant Charges <span class="float-right text-dark">25/-</span></p>
                        <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">
                           <i class="icofont-info-circle"></i>
                           </span> <span class="float-right text-dark">10/-</span>
                        </p>
                        
                        <hr />
                        <h6 class="font-weight-bold mb-0">TO PAY  <span class="float-right"><?php echo ($sum+25+10);?>/-</span></h6>
                     </div>
                          <input type="hidden" name="total_amount" value="<?php echo ($sum+25+10);?>"/>
                          <input type="submit" class="btn btn-success btn-block btn-lg"  value="Order Now By COD">
                     
                      </form>
                  </div>
				  <div class="pt-2"></div>
                 
				
               </div>
            </div>
         </div>
      </section>
       <?php
     }
     ?>
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
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>