<?php 
session_start();
date_default_timezone_set('Asia/Yangon');
include('../db.php');
if(isset($_POST['name']) && isset($_POST['password']))
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	$sql=mysqli_query($conn,"SELECT * FROM user WHERE name='$name' AND password='$password'");
	$row=mysqli_fetch_assoc($sql);
	if(mysqli_num_rows($sql)>0)
	{
		$_SESSION['id']=$row['id'];
		$_SESSION['login_date']=date('Y-m-d h:i:s');
		mysqli_query($conn,"INSERT INTO online_user (user_id,active_date,login_date) VALUES ('".$_SESSION['id']."',now(),'".$_SESSION['login_date']."')");
		header("location:../home.php");
	}else{
		echo "<script>alert('Login Failed, Try again');window.location.href='../index.php';</script>";
	}
}
?>