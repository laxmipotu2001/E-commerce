<?php
    session_start();
    $con=mysqli_connect("localhost","root","","task");
    if(isset($_POST['btn']))
    {
    	$id=$_GET['id'];
    	$fname=$_POST['fname'];
    	$lname=$_POST['lname'];
    	$email=$_POST['email'];
    	$pass=$_POST['password'];
    	$mobile=$_POST['mobile'];
    	$filename = $_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "./img/" . $filename;
		if (move_uploaded_file($tempname,$folder)) 
		{
	    	$sql="update register set fname='$fname',lname='$lname',email='$email',password='$pass',mobile='$mobile',img='$filename'";
	    	if(mysqli_query($con,$sql))
	    	{
	    		echo "<script>alert('Profile Updated')</script>";
	    		
	    	}
	    	else
	    	{
	    		echo "error in profile updation".mysqli_error($con);
	    	}
	    	header("userprofile.php");
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
		background-color:lightgray;
		height:450px;
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
		<?php
    		$con=mysqli_connect("localhost","root","","task");
    		$id=$_GET['id'];
    		$sql="select * from register where id='$id'";
	        $rs=mysqli_query($con,$sql);
	        $rw=mysqli_fetch_row($rs);
	           $fname=$rw[1];
	           $lname=$rw[2];
	           $email=$rw[3];
	           $pass=$rw[4];
	           $mobile=$rw[5]; 
	           $id=$rw[0];
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<table cellpadding="10px" cellspacing="10px" style=" font-size:20px">
				<tr>
					<td>Profile Photo</td>
					<td><input type="file" name="uploadfile" required autocomplete="off"></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="fname" required autocomplete="off" value="<?php echo $fname;?>"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="lname" required autocomplete="off" value="<?php echo $lname;?>"></td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td><input type="tel" name="mobile" required autocomplete="off" value="<?php echo $mobile;?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email" required autocomplete="off" value="<?php echo $email;?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required autocomplete="off" value="<?php echo $pass;?>"></td>
				</tr>
			</table>
			<button name="btn">Register</button>
		</form>
	</div>
	</center>
</body>
</html>