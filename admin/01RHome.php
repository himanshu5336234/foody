<?php
session_start();

include '../mycon.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Restaurant | Home</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <?php include_once './01RNav.php'; ?>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
           <?php include_once './01RHeader.php'; ?>
        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Welcome <?php echo $_SESSION['r_name'];?></small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner">

               
				<div class="row">
				<div class="col-md-12">
				
					</div>		
				</div> 	
                <!-- /. ROW  -->

	   
				
				
				
                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                In Process Orders
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Order_ID</th>
                                            <th>User_ID</th>
                                            <th>Message</th>
                                            <th>Amount</th>
                                            <th>Duration</th>
                                            
                                            <th>Delivery_In</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $q="select * from orders where status='In Process'";
                                       $re=$con->query($q);
                                       $i=1;
                                       while($r=$re->fetch_assoc())
                                       {
                                           ?>
                                         <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $r['order_id'];?></td>
                                            <td>
                                                <ul>
                                                <?php 
                                                $uid=$r['uid'];
                                                $q1="select * from users where uid=$uid";
                                                $re1=$con->query($q1);
                                                while($r1=$re1->fetch_assoc())
                                                {
                                                    ?>
                                                    <li><?php echo $r1['name'];?></li>
                                                    <li><?php echo $r1['mobile'];?></li>
                                                    <li><?php echo $r1['email'];?></li>
                                                    <li><?php echo $r1['address'];?></li>
                                                <?php
                                                }
                                                ?>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <?php  
                                                    $order_id=$r['order_id'];
                                                    $q2="select * from cart where order_id='$order_id'";
                                                    $re2=$con->query($q2);
                                                    while($r2=$re2->fetch_assoc())
                                                    {
                                                        ?>
                                                    <li><?php echo $r2['p_name'];?>(<?php echo $r2['quantity'];?>) - <?php echo $r2['r_name'];?></li>
                                                    <?php
                                                    }
                                                    $q2="";
                                                    ?>
                                                </ul>
                                            </td>
                                            <td class="center"><?php echo $r['total_amount'];?>/-</td>
                                            <td class="center">Request @ <br/><?php echo $r['request_duration'];?><br/>
                                                Response @ <br/><?php echo $r['response_duration'];?></td>
                                           
                                            <td>
                                                <?php
                                                $q6="select TIMESTAMPDIFF(SECOND, request_duration, response_duration) AS difference FROM orders where order_id='$order_id';";
                                                $re6=$con->query($q6);
                                                while($r6=$re6->fetch_assoc())
                                                {
                                                   $d = $r6['difference'];
                                                echo gmdate("H:i:s",$d);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $status = $r['status'];
                                                if($status=='In Process')
                                                {
                                                    ?>
                                                <a href="01ROrders.php?oid=<?php echo $r['oid'];?>" class="btn btn-primary"><?php echo $r['status'];?></a>
                                                <?php
                                                }
                                                if($status=='Delivered')
                                                {
                                                    ?>
                                                <a href="#" class="btn btn-success"><?php echo $r['status'];?></a>
                                                <?php
                                                }
                                                if($status=='Canceled')
                                                {
                                                    ?>
                                                <a href="#" class="btn btn-danger"><?php echo $r['status'];?></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
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

                    </div>
                </div>
                <!-- /. ROW  -->
			
		
				<footer>
                                    <?php include './01AFooter.php'; ?>
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="assets/js/chartjs.js"></script> 

</body>

</html>