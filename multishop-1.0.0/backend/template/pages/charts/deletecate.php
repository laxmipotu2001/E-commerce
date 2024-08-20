<?php
	$con=mysqli_connect("localhost","root","","task");
	$id=$_GET['id'];
	$sql="delete from category where cid='$id'";
	if(mysqli_query($con,$sql))
	{
		header("location:chartjs.php");
	}
	else
	{
		echo "Error in deleting".mysqli_error($con);
	}

?>