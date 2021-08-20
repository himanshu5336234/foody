<?php
session_start();
include '../mycon.php';

$rid = $_REQUEST['rid'];
$q="select * from restaurants where rid=$rid";
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
    <title><?php echo $r['r_name']; ?></title>
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
        if(isset($_SESSION['r_u']))
        {
            ?>
                alert("<?php echo $_SESSION['r_u'];?>");
                <?php
            unset($_SESSION['r_u']);
        }
        ?>
        </script>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <?php include './01ANav.php'; ?>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            
            <?php include './01AHeader.php'; ?>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-8">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="01ARestaurant_Update_Info.php" method="post">
                                    <input type="hidden" name="rid" value="<?php echo $rid;?>"/>
                                    <table class="table"  style="font-weight: bold;font-size: large;font-style: italic;color: darkblue;">
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select name="status" class="form-control">
                                                    <option><?php echo $r['status'];?></option>
                                                    <option>Active</option>
                                                    <option>Not Active</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Restaurant  Name</td>
                                            <td><input type="text" name="r_name" value="<?php echo $r['r_name'];?>" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td><input type="text" name="r_mobile" value="<?php echo $r['r_mobile'];?>" required="required" class="form-control" maxlength="10"/></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" name="r_email" value="<?php echo $r['r_email'];?>" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input  type="text" name="r_password" value="<?php echo $r['r_password'];?>" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>
                                                <select name="r_city" class="form-control">
                                                    <option><?php echo $r['r_city'];?></option>
                                                    <option>Aligarh</option>
                                                    <option>Agra</option>
                                                    <option>Noida</option>
                                                    <option>Mathura</option>
                                                    <option>Delhi</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><textarea name="r_address" class="form-control" required="required"><?php echo $r['r_address'];?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>About</td>
                                            <td><textarea name="r_about" class="form-control" required="required"><?php echo $r['r_about'];?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" value="Update Restaurant" class="btn btn-primary"/>
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
                        <div class="panel-heading">
                             About <?php echo $r['r_name'];?>
                             <img src="pics/resto/<?php echo $r['r_pic'];?>" style="width: 300px;height: 300px;" class="img-rounded img-thumbnail"/>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="01ARestaurant_Update_Pic.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="rid" value="<?php echo $rid;?>"/>
                                    <table class="table">
                                        <tr>
                                            <td><input type="file" name="r_pic" class="form-control" required="required"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="pic_update" value="Update Image" class="btn btn-primary"/></td>
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
    echo "Sorry Data not found.";
}
?>