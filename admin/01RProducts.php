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
    <title>All Products</title>
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
        if (isset($_SESSION['p_update'])) {
        ?>
            alert("<?php echo $_SESSION['p_update']; ?>");
        <?php
            unset($_SESSION['p_update']);
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
        <div id="page-wrapper">


            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Products | <a href="01RProduct_Form.php">Add New Product</a>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Offer</th>

                                                <th>Status</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $name = $_SESSION['r_name'];
                                            $q = "select rid from restaurants where r_name='$name' ";
                                            $result = $con->query($q);
                                            $row = $result->fetch_assoc();
                                            echo  $solution = $row['rid'];
                                            $q1 = "select * from products where rid='$solution'";
                                            $re = $con->query($q1);
                                            $i = 1;
                                            while ($r = $re->fetch_assoc()) {
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="pics/products/<?php echo $r['p_pic']; ?>" title="<?php echo $r['p_pic']; ?>" style="width: 50px;height: 50px;" class="img-rounded" /></td>
                                                    <td><?php echo $r['p_category']; ?></td>
                                                    <td><?php echo $r['p_name']; ?></td>
                                                    <td class="center"><?php echo $r['p_price']; ?></td>
                                                    <td class="center"><?php echo $r['p_offer']; ?></td>

                                                    <td><?php echo $r['p_status']; ?></td>
                                                    <td><a href="01RProduct_Info.php?pid=<?php echo $r['pid']; ?>" class="btn btn-success">View</a></td>
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
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>