<?php
session_start();
include_once './mycon.php';
$name = $_REQUEST['name'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$city = $_REQUEST['city'];
$q= "insert into users(name,city,email,password,mobile)values('$name','$city','$email','$password','$mobile');";
if($con->query($q))
{
    $_SESSION['u_s']="User has successfully Registered.";
    header("location:./login.php");
}
else
{
    $_SESSION['u_s'] = "Error : ". mysqli_error($con);
    header("location:./register.php");
}
?>