<?php
session_start();
include_once './mycon.php';
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$role = $_REQUEST['role'];
if($role=="Admin")
{
    if($email=="admin@gmail.com" && $password=="123@123")
    {
        $_SESSION['admin']="Admin";
        header("location:./admin/01AHome.php");
    }
    else
    {
        $_SESSION['fail']="Sorry Admin Login has Failed.";
        header("location:./login.php");
    }
}
if($role=="Restaurant")
{
    $q="select * from restaurants where r_email='$email' and r_password='$password'";
    $re=$con->query($q);
    
    if($r=$re->fetch_assoc())
    {
        $_SESSION['rid']=$r['rid'];
        $_SESSION['r_name']=$r['r_name'];
        header("location:./admin/01RHome.php");
    }
    else
    {
        $_SESSION['fail']="Sorry Restaurant Login has Failed.";
        header("location:./login.php");
    }
}

if($role=="User")
{
    $q="select * from users where email='$email' and password='$password'";
    $re=$con->query($q);
    
    if($r=$re->fetch_assoc())
    {
        $_SESSION['uid']=$r['uid'];
        $_SESSION['name']=$r['name'];
        $_SESSION['city']=$r['city'];
        $_SESSION['order_id']= rand(1, 10000);
        header("location:./home.php");
    }
    else
    {
        $_SESSION['fail']="Sorry Restaurant Login has Failed.";
        header("location:./login.php");
    }
}
?>