<?php
session_start();
include '../mycon.php';
$pid = $_REQUEST['pid'];
$p_pic = $_FILES['p_pic']['name'];
$tmp = $_FILES['p_pic']['tmp_name'];
$location = "./pics/products/";
move_uploaded_file($tmp, $location.$p_pic);
$q="update products set p_pic='$p_pic' where pid=$pid";
if($con->query($q))
{
   $_SESSION['pro_pic']="Product Image has successfully updated.";
}
else
{
    $_SESSION['pro_pic'] = "Error : ".mysqli_error($con);
}
header("location:./01RProduct_Info.php?pid=$pid");
?>