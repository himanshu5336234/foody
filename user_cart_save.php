<?php
session_start();
include './mycon.php';
$uid=$_REQUEST['uid'];
$pid=$_REQUEST['pid'];
$rid=$_REQUEST['rid'];
$p_name=$_REQUEST['p_name'];
$p_pic=$_REQUEST['p_pic'];
$p_price=$_REQUEST['p_price'];
$p_offer=$_REQUEST['p_offer'];
$total = $_REQUEST['total'];
$quantity=$_REQUEST['quantity'];
$r_name=$_REQUEST['r_name'];
$order_id=$_SESSION['order_id'];
$q="insert into cart(pid,rid,uid,p_name,p_pic,p_price,p_offer,p_amount,quantity,r_name,duration,cart_day,order_id)values($pid,$rid,$uid,'$p_name','$p_pic','$p_price','$p_offer','$total','$quantity','$r_name',now(),now(),'$order_id');";
if($con->query($q))
{
    $_SESSION['cart_save']="Item has successfully Add";
    
}
else
{
    $_SESSION['cart_save'] = "Error : ".mysqli_error($con);
  
}
header("location:./user_cart.php");
?>