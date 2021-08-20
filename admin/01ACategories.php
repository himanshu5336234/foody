<?php
session_start();
include_once '../mycon.php';
if(isset($_REQUEST['cid']))
{
    $cid = $_REQUEST['cid'];
    $q1="delete from categories where cid=$cid";
    if($con->query($q1))
    {
        $_SESSION['c_d']="Category has successfully Removed.";
    }
 else {
        $_SESSION['c_d'] = "Error : ".mysqli_error($con);
    }
}
?>﻿
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>All Categories</title>
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
        if(isset($_SESSION['c_s']))
        {
            ?>
                alert("<?php echo $_SESSION['c_s'];?>");
                <?php
            unset($_SESSION['c_s']);
        }
        if(isset($_SESSION['c_d']))
        {
            ?>
                alert("<?php echo $_SESSION['c_d'];?>");
                <?php
            unset($_SESSION['c_d']);
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
                        <div class="panel-heading">
                            All Categories
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <td>Category</td>
                                            <th>Name</th>
                                            <th>Option</th>
                                            
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $q="select * from categories";
                                       $re=$con->query($q);
                                       $i=1;
                                       while($r=$re->fetch_assoc())
                                       {
                                           ?>
                                         <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><img src="pics/products/<?php echo $r['c_pic']; ?>" title="<?php echo $r['c_pic']; ?>" style="width: 50px;height: 50px;" class="img-rounded"/></td>
                                            <td><?php echo $r['c_name'];?></td>
                                            <td><a href="01ACategories.php?cid=<?php echo $r['cid'];?>" class="btn btn-danger">Remove</a></td>
                                              </tr>
                                        <?php
                                           $i++;
                                       }
                                       ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                <div class="col-md-4">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Category
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="01ACategories_save.php" method="post" enctype="multipart/form-data">
                                    <table class="table">
                                        <tr>
                                            <td>Category<br/>
                                                <input type="text" name="c_name" class="form-control" required="required"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Upload Image<br/> 
                                                <input type="file" name="c_pic" class="form-control" required="required"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" value="Save Categories" class="btn btn-success"/>
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
