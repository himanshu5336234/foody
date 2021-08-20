<?php
session_start();
include './mycon.php';
$name = $_REQUEST['name'];
$mobile = $_REQUEST['mobile'];
$email  = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$q="insert into contact(name,mobile,email,subject,message,duration)values('$name','$mobile','$email','$subject','$message',now());";
if($con->query($q))
{
    $_SESSION['con_save']="Message has successfully send.";
}
else
{
    $_SESSION['con_save'] = "Error : ".mysqli_error($con);
}
header("location:./user_contact.php");
?>