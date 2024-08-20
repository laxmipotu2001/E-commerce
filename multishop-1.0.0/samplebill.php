<!-- Bill Code Start --> 
<?php 
$to = 'battinbalmani@gmail.com'; 
$from = 'battinbalmani@gmail.com'; 
$fromName = 'Balmani'; 
$subject="Regarding Your Order";
$total=0;
    $con=mysqli_connect("localhost","root","","task");
    $sql="select * from product1";
    $rs=mysqli_query($con,$sql);
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
     <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">MULTISHOP</h1>
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
                    <h2 class="heading">Invoice No.: 001</h2>
                    <p class="sub-heading">Email Address: customer@gfmail.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name:  </p>
                    <p class="sub-heading">Address:  </p>
                    <p class="sub-heading">Phone Number:  </p>
                    <p class="sub-heading">City,State,Pincode:  </p>
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
                while($rw=mysqli_fetch_row($rs))
                { 
                 
                    ?>

                     <?php 
                     $body=$body.' 
                             <tr>
                             <td>'.$rw[1].'</td>    
                             <td>'.$rw[2].'</td> 
                             <td>1</td>
                             <td>'.$rw[2].'</td>
                             </tr> '; 
                             $total=$total+$rw[2];   
                  ?>

                <?php 
                }
                $body=$body.'
                <tr>
                 <td colspan="3" class="text-right">Total Bill</td>
                 <td>'.$total.'</td>
                </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>
         </body> 
         </html>';
    ?> 
    
     <?php
   

    
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 

$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
if (mail($to, $subject, $body, $headers))
 {
    echo "Email successfully sent to $to...";
} 
else {
    echo "Email sending failed...";
}

?> 
<!-- Bill code End -->