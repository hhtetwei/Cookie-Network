<?php 
include('../db.php');
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$dob=$_POST['dob'];
	// $hash_password=hash('md5', $password);
	$gender=$_POST['gender'];
	$photo=$_FILES['photo']['name'];
	$tmp=$_FILES['photo']['tmp_name'];
	$address=$_POST['address'];

	if($photo)
	{
		move_uploaded_file($tmp,"../img/$photo");
	}else{
		$photo='empty.png';
	}

	$sql=mysqli_query($conn,"SELECT * FROM user WHERE name='$name'");
	if(mysqli_num_rows($sql)>0)
	{
		echo "<script>alert('Username Already Exist');window.location.href='../index.php';</script>";
	}elseif($password==$cpassword)
	{
		mysqli_query($conn,"INSERT INTO user (name,password,cpassword,email,phone,dob,gender,photo,address,created_date,modified_date) VALUES ('$name','$password','$cpassword','$email','$phone','$dob','$gender','$photo','$address',now(),now())");
		echo "<script>alert('Successfully Registrated, Please Login');window.location.href='../index.php';</script>";
	}else{
		echo "<script>alert('Passwords do not match');window.location.href='../index.php';</script>";
	}

}
?>