<?php 
session_start();
include('../db.php');
mysqli_query($conn,"DELETE FROM online_user WHERE user_id='".$_SESSION['id']."' AND login_date='".$_SESSION['login_date']."'");

unset($_SESSION['id']);
header("location:../index.php");
?>