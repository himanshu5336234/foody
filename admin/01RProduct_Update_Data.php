<?php
session_start();
include '../mycon.php';
$pid = $_REQUEST['pid'];
$p_status = $_REQUEST['p_status'];
$p_name=$_REQUEST['p_name'];
$p_category=$_REQUEST['p_category'];
$p_price=$_REQUEST['p_price'];
$p_offer=$_REQUEST['p_offer'];
$p_about = $_REQUEST['p_about'];
$q="update products set p_name='$p_name',p_category='$p_category',p_price=$p_price,p_offer=$p_offer where pid=$pid";
if($con->query($q))
{
    $_SESSION['p_update']="Product Information has successfully updated.";
}
else
{
    $_SESSION['p_update'] = "Error : ".mysqli_error($con);
}
header("location:./01RProducts.php");
?>