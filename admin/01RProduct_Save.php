<?php
session_start();
include_once '../mycon.php';
$rid = $_REQUEST['rid'];
$p_name=$_REQUEST['p_name'];
$p_category=$_REQUEST['p_category'];
$p_price=$_REQUEST['p_price'];
$p_offer=$_REQUEST['p_offer'];
$p_about = $_REQUEST['p_about'];
$p_pic = $_FILES['p_pic']['name'];
$tmp = $_FILES['p_pic']['tmp_name'];
$location = "./pics/products/";
move_uploaded_file($tmp, $location.$p_pic);
$q="insert into products(rid,p_name,p_category,p_price,p_offer,p_about,p_pic)values($rid,'$p_name','$p_category',$p_price,$p_offer,'$p_about','$p_pic');";
if($con->query($q))
{
    header("location:./01RProducts.php");
}
else
{
    $_SESSION['p_s'] = "Error : ".mysqli_error($con);
    header("location:./01RProduct_Form.php");
}
?>