<?php
$con=mysqli_connect("localhost","root","","task");
if(isset($_POST['btn']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$mobile=$_POST['mobile'];
	$sql="insert into register (fname,lname,email,password,mobile) values('$fname','$lname','$email','$pass')";
	if(mysqli_query($con,$sql))
	{
		header("location:login.php");
	}
	else
	{
		mysqli_error($con);
	}
}
	else
	{
		mysqli_error($con);
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
		margin-top: 150px;
		background-color:lightgray;
		height:400px;
		width: 500px;
		padding: 20px;
		border-radius: 20px;
	}
	button
	{
		height: 40px;
		width: 120px;
		font-size: 16px;
	}
</style>
<body>
	<center>
		<div class="form">
		<h1>Create an Account</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table cellpadding="10px" cellspacing="10px" style=" font-size:20px">
				<tr>
					<td>First Name</td>
					<td><input type="text" name="fname" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="lname" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td><input type="tel" name="mobile" required autocomplete="off"></td>
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
			<button name="btn">Register</button>
		</form>
	</div>
	</center>
</body>
</html>