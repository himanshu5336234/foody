<?php
session_start();
include './mycon.php';
if(isset($_REQUEST['oid']))
{
    $oid=$_REQUEST['oid'];
    $q3="update orders set status='Canceled',response_duration=now() where oid=$oid";
    if($con->query($q3))
    {
        $_SESSION['order_cancel']="Your order has successfully Canceled.";
    }
}
$uid=$_SESSION['uid'];
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
      <title>My Orders</title>
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
       <script type="text/javascript">
       <?php
       if(isset($_SESSION['order_cancel']))
       {
           ?>
               alert("<?php echo $_SESSION['order_cancel'];?>");
               <?php
           unset($_SESSION['order_cancel']);
       }
       ?>
       </script>
      
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
                               <img class="mb-3 rounded-pill shadow-sm mt-1" src="admin/pics/users/<?php echo $r['pic'];?>"  style="width: 100px;height: 100px;" alt="gurdeep singh osahan">
                              <div class="osahan-user-media-body">
                                 <h6 class="mb-2"><?php echo $r['name'];?></h6>
                                 <p class="mb-1"><?php echo $r['mobile'];?></p>
                                 <p><?php echo $r['email'];?></p>
                                 <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#edit-profile-modal" href="#"><?php echo $r['address'];?></a></p>
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
                           <h4 class="font-weight-bold mt-0 mb-4">My Orders</h4>
                           <?php
                           $q1="select * from orders where uid=$uid and status!='Canceled' ORDER BY request_duration desc" ;
                           $re1=$con->query($q1);
                           $i=1;
                           while($r1=$re1->fetch_assoc())
                           {
                               $order_id=$r1['order_id'];
                               ?>
                           <div class="bg-white card mb-4 order-list shadow-sm">
                              <div class="gold-members p-4">
                                 <a href="#">
                                    <div class="media">
                                       <div class="media-body">
                                          <span class="float-right text-info"><?php echo $r1['response_duration'];?> </span>
                                          <h6 class="mb-2">
                                 <?php
                                     $q2="select * from cart where order_id='$order_id'";
                                     $re2=$con->query($q2);
                                     while($r2=$re2->fetch_assoc())
                                     {
                                        echo $r2['p_name'].' - '.$r2['quantity'].', ';
                                     }
                                     ?>
                                          </h6>
                                 <p class="text-gray mb-1"><i class="icofont-location-arrow"></i> <?php echo $r['address'];?>
                                 </p>
                                 <p class="text-gray mb-3"><i class="icofont-list"></i> ORDER #<?php echo $r1['order_id'];?> <i class="icofont-clock-time ml-2"></i> <?php echo $r1['request_duration'];?></p>
                                 
                                 <hr>
                                 <div class="float-right">
                                
                                 <a class="btn btn-sm btn-success" href="#"><i class="icofont-refresh"></i> <?php echo $r1['status'];?></a> 
                                     <?php 
                                     $status = $r1['status'];
                                     if($status=='In Process')
                                     {
                                        ?>
                                 |  <a class="btn btn-sm btn-primary" href="user_order.php?oid=<?php echo $r1['oid'];?>"><i class="icofont-refresh"></i>Cancel</a>
                                 <?php
                                     }
                                     ?>
                                 </div>
                                 <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total Paid:</span>  &#8377;<?php echo $r1['total_amount'];?>/-
                                 </p>
                                 </div>
                                 </div>
                                 </a>
                              </div>
                           </div>
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