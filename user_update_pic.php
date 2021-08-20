<?php
session_start();
include_once './mycon.php';
$uid = $_SESSION['uid'];
$pic = $_FILES['pic']['name'];
$tmp = $_FILES['pic']['tmp_name'];
$location = "./admin/pics/users/";
move_uploaded_file($tmp, $location.$pic);
$q="update users set pic='$pic' where uid=$uid";
if($con->query($q))
{
    header("location:./user_info.php");
}
else
{
    echo "Error : ".mysqli_error($con);
}
?>