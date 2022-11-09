<?php 
session_start();
include('../db.php');
if(isset($_POST['comment']))
{
	$comment=$_POST['comment'];
	$post_id=$_POST['post_id'];
	mysqli_query($conn,"INSERT INTO comment (comment,post_id,user_id,created_date,modified_date) VALUES ('$comment','$post_id','".$_SESSION['id']."',now(),now())");
}
?>