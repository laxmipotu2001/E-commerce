<?php
$con=mysqli_connect("localhost","root","","task");
$id=$_GET['id'];
$sql="delete from product where id=$id";
if(mysqli_query($con,$sql))
{
	header("location:mdi.php");
}
else
{
	mysqli_error($con);
}

?>