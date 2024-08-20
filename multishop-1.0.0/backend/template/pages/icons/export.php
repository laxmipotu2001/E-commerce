<?php
	$file= "products.xls";
	header("Content-Disposition:attachment; filename=\"$file\"");
	header("Content-type:application/vnd.ms-excel");
	$con=mysqli_connect("localhost","root","","task");
	$sql="select * from product";
	$rs=mysqli_query($con,$sql);
	echo "<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Image</th>";
	echo "<th>Product Name</th>";
	echo "<th>Price</th>";
	echo "<th>Category</th>";
	echo "<th>Details</th>";
	echo "</tr>";
	while($rw=mysqli_fetch_row($rs))
	{
			echo "<tr>";
			echo "<td>";
			echo $rw[0];
			echo "</td>";
			echo "<td>";
			echo $rw[1];
			echo "</td>";
			echo "<td>";
			echo $rw[2];
			echo "</td>";
			echo "<td>";
			echo $rw[3];
			echo "</td>";
			echo "<td>";
			echo $rw[4];
			echo "</td>";
			echo "<td>";
			echo $rw[5];
			echo "</td>";
	}
	echo "</tr>";
	echo "</table>";
?>