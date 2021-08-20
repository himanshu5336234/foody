<?php
session_start();
include '../mycon.php';
$r_name = $_REQUEST['r_name'];
$r_mobile = $_REQUEST['r_mobile'];
$r_email = $_REQUEST['r_email'];
$r_password = $_REQUEST['r_password'];
$r_city = $_REQUEST['r_city'];
$q="insert into restaurants(r_name,r_mobile,r_email,r_password,r_city)values('$r_name','$r_mobile','$r_email','$r_password','$r_city');";
if($con->query($q))
{
    $_SESSION['r_s']="Restaurant has successfully saved.";
    header("location:./01ARestaurants.php");
}
else
{
    $_SESSION['r_s'] = "Error : ".mysqli_error($con);
    header("location:./01ARestaurant_Form.php");
}
?>