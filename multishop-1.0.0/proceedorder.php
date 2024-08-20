<?php
    session_start();
    $con=mysqli_connect("localhost","root","","task");
    if(isset($_POST['btn']))
    {
        if(isset($_SESSION['username']))
        {
            $customer=$_SESSION['username'];
            $sq="select id from register where email='$customer'";
            $res=mysqli_query($con,$sq);
            $cid=mysqli_fetch_row($res);
            // echo $cid[0];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $add=$_POST['add'];
            $country=$_POST['country'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $zip=$_POST['zip'];
            $payment=$_POST['payment'];
            $items=array();
            $price1=array();
            $prod=array();
            $total=0;
            foreach($_SESSION['pid'] as $id)
            {
                $sql="select * from product where id='$id'";
                $rs=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_row($rs))
                {
                    $pname=$rw[2];
                    array_push($items,$pname);
                    array_push($prod,$pname);
                    $price=$rw[3];
                    array_push($price1,$price);
                    $total=$total+$price;
                }
            } 
                $cartprod=implode(",", $prod);
                 $random=rand(1000,9999);
                $sql2= "insert into order_detail(prod_name,price,cust_id,invoice) values('$cartprod','$total','$cid[0]','$random')";
                mysqli_query($con,$sql2);



              $sql1= "insert into billing_detail (fname,lname,email,mobile,address,country,city,state,zip,cust_id,payment) values('$fname','$lname','$email','$mobile','$add','$country','$city','$state','$zip','$cid[0]','$payment')";
                $to = $email; 
                $from = 'battinbalmani@gmail.com'; 
                $fromName = 'Balmani'; 
                $subject="Regarding Your Order";

            if(mysqli_query($con,$sql1))
            {
                        echo "<script>alert('Product Ordered Successfully !!!');</script>";
                        $body='<html> 
                        <head>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
    </head>
                    <body> 
                    <h1>Your Order has been successfully placed!!!</h1>
                    <div class="container">
                        <div class="brand-section">
                            <div class="row">
                                <div class="col-6">
                                    '."<img src='https://scontent.fpnq7-2.fna.fbcdn.net/v/t39.30808-1/304856188_415911114008871_6732882682735818972_n.jpg?stp=cp0_dst-jpg_e15_p120x120_q65&_nc_cat=108&ccb=1-7&_nc_sid=5fac6f&_nc_ohc=VFEMUtmFeMIAX-Eqv88&_nc_ht=scontent.fpnq7-2.fna&oh=00_AfBu-K7L-53bb_ITdUkelz_a0l8SKIIB45QOEpGLp5tMtw&oe=652A31AC' height='100px' width='150px'>".'
                                </div>
                                <div class="col-6">
                                    <div class="company-details">
                                        <p class="text-white">Customer Service</p>
                                        <p class="text-white">+012 345 6789</p>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="body-section">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="heading">Invoice No.:'.$random.'</h2>
                                <p class="sub-heading">Email Address: info@example.com </p>
                            </div>
                            <div class="col-6">
                                <p class="sub-heading">Full Name:'.$fname.' '.$lname.'</p>
                                <p class="sub-heading">Address:'.$add.'  </p>
                                <p class="sub-heading">Phone Number:'.$mobile.'  </p>
                                <p class="sub-heading">City,State,Pincode:'.$city.','.$state.','.$zip.'</p>
                            </div>
                        </div>
                    </div>
                    <div class="body-section">
                    <h3 class="heading">Ordered Items</h3>
                    <br>
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="w-20">Price</th>
                                <th class="w-20">Quantity</th>
                                <th class="w-20">Grandtotal</th>
                            </tr>
                        </thead>
                        <tbody>';
                    for($i=0;$i<count($items);$i++)
                    {
                        $body=$body.' 
                         <tr>
                         <td>'.$items[$i].'</td>  
                         <td>'.$price1[$i].'</td>
                         <td>1</td>
                         <td>'.$price1[$i].'</td> 
                         </tr> ';  
                    }
                
                $body=$body.'
                <tr>
                 <td colspan="3" class="text-right">Total Bill</td>
                 <td>'.$total.'</td>
                </tr>
                </tbody>
                    </table>
                    <br>
                    <h3 class="heading">Payment Mode:'.$payment.'</h3>
                </div>
            </body> 
            </html>';
                    $headers = "MIME-Version: 1.0" . "\r\n"; 
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
                    mail($to, $subject, $body, $headers);
                        // {
                        //     echo "mail sent successfully";
                        // }
                        // else
                        // {
                        //     echo "Error in sending mail".mysqli_error($con);
                        // }
                    $url="index.php";
                    echo "<script type='text/javascript'>";
                    echo 'window.location.href="'.$url.'";';
                    echo "</script>";
            }
            else
            {
                echo "<script>alert('Error While Ordering The Product !!!');</script>".mysql_error($con);
            }

        }

        else
        {
            header("location:login.php");
        }

    }     
?>
