<?php
	session_start();
	session_destroy();
	header("Location:adminlogin.php");
	// echo "<h1>Logged out Successfully<h1>";
?>
<!-- <button><a href="login.php">LOGIN</button><br> -->
