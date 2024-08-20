<?php
session_start();
$con=mysqli_connect("localhost","root","","task");
if(isset($_POST['btn']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$filename = $_FILES["img"]["name"];
	$tempname = $_FILES["img"]["tmp_name"];
	$folder = "./assets/images/".$filename;
	if (move_uploaded_file($tempname,$folder)) 
	{
		$sql="insert into admin_reg(username,email,password,img) values('$username','$email','$password','$filename')";
		if(mysqli_query($con,$sql))
		{
			echo "<script>alert('Registration Successful')</script>";
			header("location:adminlogin.php");
		}
		else
		{
			echo "error in Registration".mysqli_error($con);
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrater here</title>
</head>
<style>
	.form
	{
		margin-top: 120px;
		background-color: #89CFF0;
		height: 440px;
		width: 400px;
		padding: 20px;
		border-radius: 10px;
	}
	button
	{
		height: 30px;
		width: 80px;
		border: none;
		color: black;
		font-size: 16px;
		border-radius: 10px;
	}
</style>
<body>
	<center>
		<div class="form">
		<h1>Admin Registration</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table cellpadding="10px" cellspacing="10px" style=" font-size:20px">
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Upload Image</td>
					<td><input type="file" name="img" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required autocomplete="off"></td>
				</tr>
			</table>
			<br>
			<button name="btn">Register</button><br><br>
			<!-- <a href="forgetpass.php" style="text-decoration: none; color: black; font-size: 18px;">Forget Password</a><br><br> -->
			<a href="adminlogin.php">Login HERE</a>
		</form>
	</div>
</center>
</body>
</html>