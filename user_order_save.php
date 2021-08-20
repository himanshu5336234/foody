<?php
session_start();
include './mycon.php';
$order_id=$_REQUEST['order_id'];
$uid = $_SESSION['uid'];
$message = $_REQUEST['message'];
$total_amount=$_REQUEST['total_amount'];
$q="insert into orders(order_id,uid,total_amount,message,request_duration)values('$order_id','$uid','$total_amount','$message',now());";
if($con->query($q))
{
    $_SESSION['order_id']= rand(10000, 999999);
    header("location:./user_order.php");
}
else
{
    echo "Error : ".mysqli_error($con);
}

?>