<?php 
if(isset($_POST['to']) && isset($_POST['from']))
{
	$to=$_POST['to'];
	$from="From: ".$_POST['from'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	mail($to, $subject, $message,$from);
	header("location:friend.php");
}
?>