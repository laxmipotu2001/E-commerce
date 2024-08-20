<?php
	session_start();
	$con=mysqli_connect("localhost","root","","task");
	$products=array();
	if(empty($_SESSION['pid']))
    {
        echo"Your cart is Empty";
    }
    else if(isset($_SESSION['pid']))
    {
        $prod=implode(',',$_SESSION['pid']);
        $sql="select * from product where id in($prod)";
        $rs=mysqli_query($con,$sql);
        while($rw=mysqli_fetch_row($rs))
        {
            // $total=$total+$rw[3];
            array_push($products,$rw[2]);
        }
    }
    $item=implode(",", $products);
    echo $item;
       


?>