<?php
include("../connect.php");
session_start();
if(isset($_SESSION['id'])){

	$id=mysqli_real_escape_string($con,$_SESSION['id']);
    mysqli_query($con," UPDATE `sms_teacher_att` SET `logout`='".date("h:i:sa")."' WHERE `tid`='".$id."' ");

    unset($_SESSION['id']);
    echo '<script> alert("Your have successfully logged out") </script>';
    echo '<script language="JavaScript"> window.location.href ="../index.php" </script>';
}
?>