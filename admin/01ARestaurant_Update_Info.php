<?php
session_start();
include '../mycon.php';
$r_name = $_REQUEST['r_name'];
$r_mobile = $_REQUEST['r_mobile'];
$r_email = $_REQUEST['r_email'];
$r_password = $_REQUEST['r_password'];
$r_city = $_REQUEST['r_city'];
$status = $_REQUEST['status'];
$rid=$_REQUEST['rid'];
$r_address=$_REQUEST['r_address'];
$r_about = $_REQUEST['r_about'];
$q="update restaurants set r_name='$r_name',r_mobile='$r_mobile',r_email='$r_email',r_password='$r_password',r_city='$r_city', status='$status',r_address='$r_address',r_about='$r_about' where rid=$rid";
if($con->query($q))
{
    $_SESSION['r_u']="Restaurant Information has successfully updated.";
}
else
{
    $_SESSION['r_u'] = "Error : ".mysqli_error($con);
}
header("location:./01ARestaurant_Info.php?rid=$rid");
?>