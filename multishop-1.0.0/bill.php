<?php 
$to = 'battinbalmani@gmail.com'; 
$from = 'battinbalmani@gmail.com'; 
$fromName = 'Balmani'; 
$subject="Regarding Your Order";

    $con=mysqli_connect("localhost","root","","task");
    $sql="select * from product1";
    $rs=mysqli_query($con,$sql);
    $body='<html> 
    <body> 
    <h1>Your Order has been successfully placed!!!</h1>
    <h3>Name:- Balmani Balaji Battin<br>
    Mobile No:- 8421034880<br>
    Address:- Solapur<h3><br>
            <table border="1" cellspacing="10px" cellpadding="10px" style="height:80%; width:100%; font-size:20px;">
            <thead>
            <tr>
            <th>Pname</th>
            <th>Price</th>
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
                 </tr> ';    
      ?>

    <?php 
    }
    $body=$body.'</table> 
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