<?php
session_start();
$con=mysqli_connect("localhost","root","","task");
		foreach($_SESSION['pid'] as $id)
            {
                $sql="select * from product where id='$id'";
                $rs=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_row($rs))
                {
                    // $pname=$rw[2];
                    // $price=$rw[3];
                    // echo $pname;
                    // echo $price;
                    $sql2="insert into multi(pname,price) values('$rw[2]','$rw[3]')";
                    if(mysqli_query($con,$sql2))
                    {
                        echo "data inserted";
                    }
                    else
                    {
                       mysqli_error($con);
                    }
                }
            }
?>