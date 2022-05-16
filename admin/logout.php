<?php
include("../connect.php");
session_start();
if(isset($_SESSION['id'])){

    unset($_SESSION['id']);
    echo '<script> alert("Your have successfully logged out") </script>';
    echo '<script language="JavaScript"> window.location.href ="../index.php" </script>';
}
?>