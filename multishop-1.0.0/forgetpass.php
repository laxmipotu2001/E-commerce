<?php
session_start();
$con=mysqli_connect("localhost","root","","task");
if(isset($_POST['btn']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	if($pass==$cpass)
	{
		$sql="update register set password='$pass' where email='$email'";
		mysqli_query($con,$sql);
		header("location:login.php");
	}
	else
	{
			
		echo "Enter valid password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
</head>
<style>
	.form
	{
		margin-top: 150px;
		background-color: lightgray;
		height:350px;
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
		<h1>Forgot Password Page</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table cellpadding="10px" cellspacing="10px" style=" font-size:20px">
				<tr>
					<td>Email</td>
					<td><input type="email" name="email" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cpassword" required autocomplete="off"></td>
				</tr>
			</table>
			<br>
			<button name="btn">SUBMIT</button><br><br>
			<!-- <a href="forgetpass.php" style="text-decoration: none; color: black; font-size: 18px;">Forget Password</a><br><br> -->
			<a href="register.php">REGISTER HERE</a>
		</form>
	</div>
</center>
</body>
</html>