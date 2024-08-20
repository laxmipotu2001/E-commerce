<?php
session_start();
$id=$_GET['id'];
// echo $id;
if(empty($_SESSION['pid']))
{
    $_SESSION['pid']=array();
}
array_push($_SESSION['pid'],$_GET['id']);
// echo "product added";
// echo "<script>alert('Product Added To cart')</script>";
header("location:shop.php");


?>