<?php
    $con=mysqli_connect("localhost","root","","task");
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $sql="insert into contact(name,email,subject,message) values('$name','$email','$subject','$message')";
        if(mysqli_query($con,$sql))
        {
            header("location:contact.php");
        }
        else
        {
            mysqli_error("Error in sending contact form");
        }
    }
    // else
    // {
    //     echo "button is not clicked";
    // }
?>