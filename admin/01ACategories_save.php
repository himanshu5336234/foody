<?php
session_start();
include '../mycon.php';
$c_name=$_REQUEST['c_name'];
$c_pic = $_FILES['c_pic']['name'];
$tmp = $_FILES['c_pic']['tmp_name'];
$location = "./pics/products/";
move_uploaded_file($tmp, $location.$c_pic);
$q="insert into categories(c_name,c_pic) values('$c_name','$c_pic');";
if($con->query($q))
{
   $_SESSION['c_s']="Category has successfully Saved.";
}
else
{
   $_SESSION['c_s'] = "Error : ".mysqli_error($con);
}
header("location:./01ACategories.php");
?>