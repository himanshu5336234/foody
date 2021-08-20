<?php
session_start();
include_once '../mycon.php';
?>﻿
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Add Restaurant</title>
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
        if(isset($_SESSION['r_s']))
        {
            ?>
                alert("<?php echo $_SESSION['r_s'];?>");
                <?php
            unset($_SESSION['r_s']);
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
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Add New Restaurant
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="01ARestaurant_Save.php" method="post">
                                    <table class="table"  style="font-weight: bold;font-size: large;font-style: italic;color: darkblue;  width: 70%;">
                                        <tr>
                                            <td>Enter Restaurant  Name</td>
                                            <td><input type="text" name="r_name" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Enter Mobile</td>
                                            <td><input type="text" name="r_mobile" required="required" class="form-control" maxlength="10"/></td>
                                        </tr>
                                        <tr>
                                            <td>Enter Email</td>
                                            <td><input type="email" name="r_email" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Enter Password</td>
                                            <td><input  type="password" name="r_password" required="required" class="form-control"/></td>
                                        </tr>
                                        <tr>
                                            <td>Select City</td>
                                            <td>
                                                <select name="r_city" class="form-control">
                                                    <option>Aligarh</option>
                                                    <option>Agra</option>
                                                    <option>Noida</option>
                                                    <option>Mathura</option>
                                                    <option>Delhi</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" value="Save Restaurant" class="btn btn-primary"/>
                                            </td>
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
