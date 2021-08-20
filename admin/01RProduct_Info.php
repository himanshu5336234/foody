<?php
session_start();
include '../mycon.php';
$pid = $_REQUEST['pid'];
$q="select * from products where pid=$pid";
$re=$con->query($q);
if($r=$re->fetch_assoc())
{
    ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title><?php echo $r['p_name'];?></title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
     <script type="text/javascript">
        <?php
        if(isset($_SESSION['p_s']))
        {
            ?>
                alert("<?php echo $_SESSION['p_s'];?>");
                <?php
            unset($_SESSION['p_s']);
        }
        ?>
        </script>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <?php include './01RNav.php'; ?>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            
            <?php include './01RHeader.php'; ?>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-8">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Product - <?php echo $r['p_name'];?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="01RProduct_Update_Data.php" method="post" >
                                    <input type="hidden" name="pid" value="<?php echo $r['pid'];?>"/>
                                    <table class="table"  style="font-weight: bold;font-size: large;font-style: italic;color: darkblue;">
                                        <tr>
                                            <td>Select Category</td>
                                            <td>
                                                <select name="p_category" class="form-control">
                                                    <option><?php echo $r['p_category'];?></option>
                                                   <?php
                                                   $q1="select * from categories";
                                                   $re1=$con->query($q1);
                                                   while($r1=$re1->fetch_assoc())
                                                   {
                                                       ?>
                                                    <option><?php echo $r1['c_name'];?></option>
                                                    <?php
                                                   }
                                                   ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Name</td>
                                            <td><input type="text" name="p_name"  value="<?php echo $r['p_name'];?>" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Product Price</td>
                                            <td><input type="number" name="p_price"  value="<?php echo $r['p_price'];?>" class="form-control" required="required" min="5"/></td>
                                        </tr>
                                        <tr>
                                            <td>Product Offer</td>
                                            <td><input type="number" name="p_offer"   class="form-control" required="required" value="<?php echo $r['p_offer'];?>"/></td>
                                        </tr>
                                        <tr>
                                            <td>About</td>
                                            <td>
                                                <textarea name="p_about"  class="form-control" required="required"><?php echo $r['p_about'];?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Status</td>
                                            <td><select name="p_status" class="form-control" >
                                                    <option><?php echo $r['p_status'];?></option>
                                                    <option>Available</option>
                                                    <option>Not Available</option>
                                                </select></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" value="Update Product" class="btn btn-primary"/>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                <div class="col-md-4">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <img src="pics/products/<?php echo $r['p_pic'];?>" style="width: 300px;height: 300px;" class="img-rounded img-thumbnail"/>
                            <div class="table-responsive">
                                <form action="01RProduct_Update_Pic.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="pid" value="<?php echo $pid;?>"/>
                                    <table class="table">
                                        <tr>
                                            <td><input type="file" name="p_pic" class="form-control" required="required"/></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" value="Update Product Image" class="btn btn-success"/></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
       
                <!-- /. ROW  -->
        </div>
               <footer>
               <?php include_once './01AFooter.php'; ?>    
               </footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>

<?php
}
else
{
    echo "Sorry data not found.";
}
?>