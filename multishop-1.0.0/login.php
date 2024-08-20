<?php
session_start();
$con=mysqli_connect("localhost","root","","task");
if(isset($_POST['btn']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sql="select count(id) from register where email='$email' and password='$pass'";
	$rs=mysqli_query($con,$sql);
	$rw=mysqli_fetch_array($rs);
	$login=$rw['count(id)'];
	if($login==1)
	{
		$_SESSION['username']=$email;
		header("Location:checkout.php");
	}
	else
	{
		echo "Invalid Username and Password";
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
		margin-top: 150px;
		background-color: lightgray;
		height: 340px;
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
		<h1>Login Page</h1>
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
			</table>
			<br>
			<button name="btn">LOGIN</button><br><br>
			<a href="forgetpass.php" style="text-decoration: none; color: black; font-size: 18px;">Forget Password</a><br><br>
			<a href="register.php">REGISTER HERE</a>
		</form>
	</div>
</center>
</body>
</html>