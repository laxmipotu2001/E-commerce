<?
	session_start();
	$con=mysqli_connect("localhost","root","","task");
	$sql="select * from order_detail";
	$rs=mysqli_query($con,$sql);
	if(isset($_POST['btn']))
	{
		while($rw=mysqli_fetch_row($rs))
		{
			$body=$rw[1];
			// $lname=$rw[2];
			// $email=$rw[3];
			// $mobile=$rw[4];
			// $address=$rw[5];
			// $country=$rw[6];
			// $city=$rw[7];
			// $state=$rw[8];
			// $cust_id=$rw[9];
			// $body=$rw[1];
		}
		if (mail($to_email, $subject, $body, $headers))
		{
		   echo "Email successfully sent to $to_email...";
		} 
		else
		{
		    echo "Email sending failed...".mysqli_error($con);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Semd Bill recipt</title>
</head>
<body>
	<form method="post" action="" enctype="multipart/form-data">
		From:<input type="email" name="from"><br><br>
		Subject:<input type="text" name="subject"><br><br>
		To mail:<input type="email" name="to"><br><br>
		<input type="Submit" name="btn">
	</form>

</body>
</html>