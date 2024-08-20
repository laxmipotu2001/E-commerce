<?php
    session_start();
    $con=mysqli_connect("localhost","root","","task");
    if(isset($_SESSION['username']))
    {
        $email=$_SESSION['username'];
        $sql="select * from register where email='$email'";
        $rs=mysqli_query($con,$sql);
        while($rw=mysqli_fetch_row($rs))
        {
           $fname=$rw[1];
           $lname=$rw[2];
           $email=$rw[3];
           $password=$rw[4];
           $mobile=$rw[5]; 
           $id=$rw[0];
           $img=$rw[6];
        }

    }
    else
    {
        echo "<script>alert('Please Login First')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MULTISHOP User Profile</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
* {
    padding: 0;
    margin: 0;
    list-style: none;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
    -webkit-overflow-scrolling: touch;
    font-family: "Montserrat", sans-serif;
    line-height: 1;
}

body {
    background: #F2994A; 
    background: -webkit-linear-gradient(to right, #F2C94C, #F2994A);  
    background: linear-gradient(to right, #F2C94C, #F2994A); 
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
}
.profile {
    margin: auto;
    background-color: #fff;
    border-radius: 40px;
    width: 480px;
    padding: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .photo {
        width: 120px;
        height: 120px;
        border-radius: 30px;
        border: 15px solid rgba(#f6f2ff, 0.7);
        object-fit: cover;
    }
    .name {
        margin-top: 24px;
        font-size: 22px;
        font-weight: bold;
    }
    .details {
        font-size: 13px;
        font-weight: 400;
        width: 50%;
        margin-top: 8px;
        line-height: 1.3;
        text-align: center;
    }
    .buttons {
        display: flex;
        align-items: center;
        margin-top: 50px;}
        .message {
            background-color: #F2C94C;
        }
        .follow {
            background-color: #F2994A
        }
        .button {
            width: 186px;
            height: 54px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 500;
            margin-left: 12px;
            cursor: pointer;}
            .button:first {
                margin-left: 0px;
            }

            svg {
                height: 22px;
                margin-right: 4px;
            }
            .credit a{
                text-decoration: none;
                color: #000;
              }
            
              .credit {
                  margin-top: 10px;
                  text-align: center;
              }


    </style>
  </head>
  <body>
    <div class="profile">
        <img src="./img/<?php echo $img;?>" alt="Your Profile Photo Here" class="photo">
        <span class="name"><?php echo $fname.' '.$lname?></span>
        <span class="details"><?php echo $email;?></span>
        <span class="details"><?php echo $mobile;?></span>
        <span class="details">Address:- solapur</span>
        <div class="buttons">
            <div class="button follow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <a href="logout.php" style="text-decoration: none; color: black;">Logout</a>
            </div>
            <div class="button message">
                <svg width="24" stroke-width="1.5" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M20 12V5.74853C20 5.5894 19.9368 5.43679 19.8243 5.32426L16.6757 2.17574C16.5632 2.06321 16.4106 2 16.2515 2H4.6C4.26863 2 4 2.26863 4 2.6V21.4C4 21.7314 4.26863 22 4.6 22H11" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M8 10H16M8 6H12M8 14H11" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M16 5.4V2.35355C16 2.15829 16.1583 2 16.3536 2C16.4473 2 16.5372 2.03725 16.6036 2.10355L19.8964 5.39645C19.9628 5.46275 20 5.55268 20 5.64645C20 5.84171 19.8417 6 19.6464 6H16.6C16.2686 6 16 5.73137 16 5.4Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M17.9541 16.9394L18.9541 15.9394C19.392 15.5015 20.102 15.5015 20.5399 15.9394V15.9394C20.9778 16.3773 20.9778 17.0873 20.5399 17.5252L19.5399 18.5252M17.9541 16.9394L14.963 19.9305C14.8131 20.0804 14.7147 20.2741 14.6821 20.4835L14.4394 22.0399L15.9957 21.7973C16.2052 21.7646 16.3988 21.6662 16.5487 21.5163L19.5399 18.5252M17.9541 16.9394L19.5399 18.5252" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                <a href="regupdate.php?id=<?php echo $id;?>" style="text-decoration: none; color: black;">Edit Profile
            </div>
        </div>
       <!--  <div class="credit">Made with <span style="color:tomato">❤</span> by <a  href="https://www.learningrobo.com/">Learning Robo</a></div> -->
    </div>

  </body>
</html>
