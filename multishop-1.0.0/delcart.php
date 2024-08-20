<?php
session_start();
$_SESSION['pid'];
$id=$_GET['id'];
// print_r($_SESSION['pid']);
$k=array_search($id, $_SESSION['pid']);
	unset($_SESSION['pid'][$k]);
	header('Location:cart.php');
?>