<?php
session_start();
include '../mycon.php';
$contact=0;
$users=0;
$restaurants=0;
$category=0;
$q1="select count(*) as contact from contact";
$re1=$con->query($q1);
if($r1=$re1->fetch_assoc())
{
    $contact=$r1['contact'];
}
$q2="select count(*) as restaurant from restaurants";
$re2=$con->query($q2);
if($r2=$re2->fetch_assoc())
{
    $restaurants=$r2['restaurant'];
}
$q3="select count(*) as users from users";
$re3=$con->query($q3);
if($r3=$re3->fetch_assoc())
{
    $users=$r3['users'];
}

$q4="select count(*) as category from categories";
$re4=$con->query($q4);
if($r4=$re4->fetch_assoc())
{
    $category=$r4['category'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Admin Home</title>
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
            <?php include_once './01ANav.php'; ?>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
           <?php include_once './01AHeader.php'; ?>
        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Welcome John Doe</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3><?php echo $category;?></h3>
								<small>Categories</small>
							</h3> 
						</div>
						<div class="icon">
                                                    <a href="01ACategories.php">   <i class="fa fa-eye fa-5x red"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3><?php echo $restaurants;?></h3>
								<small>Restaurants</small>
							</h3> 
						</div>
						<div class="icon">
                                                    <a href="01ARestaurants.php"> <i class="fa fa-shopping-cart fa-5x blue"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3><?php echo $contact;?></h3>
								<small>Comments</small>
							</h3> 
						</div>
						<div class="icon">
                                                    <a href="01AContacts.php">  <i class="fa fa-comments fa-5x green"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
								<h3><?php echo $users;?></h3>
								<small>Users</small>
							</h3> 
						</div>
						<div class="icon">
                                                    <a href="01AUsers.php"> <i class="fa fa-user fa-5x yellow"></i></a>
						</div>
		 
                        </div>
						</div>
                    </div>
				   
                </div>
				     
                <div class="row">
                    
                    <div class="col-md-8  mt-2">

                        <img src="pics/Administration.jpg"  class="img-responsive img-rounded img-thumbnail"/>

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