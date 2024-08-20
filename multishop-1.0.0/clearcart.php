<?php
	session_start();
	if(isset($_POST['remove']))
	{
		unset($_SESSION['pid']);
		header("location:cart.php");
	}
?>