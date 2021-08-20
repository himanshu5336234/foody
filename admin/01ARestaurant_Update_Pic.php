<?php
session_start();
include '../mycon.php';
$rid=$_REQUEST['rid'];
    $r_pic = $_FILES['r_pic']['name'];
    $tmp = $_FILES['r_pic']['tmp_name'];
    $location = "./pics/resto/";
    move_uploaded_file($tmp, $location.$r_pic);
    $q1="update restaurants set r_pic='$r_pic' where rid=$rid";
    if($con->query($q1))
    {
        header("location:./01ARestaurant_Info.php?rid=$rid");
    }
    else
    {
        echo "Error : ".mysqli_error($con);
    }
?>