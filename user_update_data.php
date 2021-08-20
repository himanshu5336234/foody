<?php
session_start();
include_once './mycon.php';
$uid = $_SESSION['uid'];
$name = $_REQUEST['name'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$address = $_REQUEST['address'];
$q="update users set name='$name',mobile='$mobile',email='$email',password='$password',address='$address' where uid=$uid";
if($con->query($q))
{
    $_SESSION['name']=$name;
    
    $_SESSION['user_update']="User Information has successfully updated.";
}
else
{
    $_SESSION['user_update'] = "Error : ".mysqli_error($con);
}
header("location:./user_info.php");
?>