
<?php  
session_start();
require_once("config.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/regeister.css" />
    <link rel="stylesheet" href="css/footer.css" />



    <title>Welcome</title>
</head>
<body>
    <header>
    
    <nav class="headr_nav">
        <div class="logo">
            <img src="images/pngtree-community-logo-people-icon-together-png-image_5395399.png" width="140px" height="120px"></a>
            <h1>task manger</h1>
        </div>
        <ul>
            <li><a href="aboutus.html">About us</a></li>
            <li><a href="contactus.php"> Contact us</a></li>
            <li><a href="" class="logout-btn "> Log out</a></li>

        </ul>
    </nav>
   </header>

   <section class="main">
   <section class="reg_form">
   
    <fieldset>
    <legend>Welcome</legend>
    <p>Welcome, dear user, you have an account on our site. To be able to log in, register now</p>
    <button type="submit"><a href="Login.php">Login</a></button>

        
    
    </fieldset>

   
   </section>

   </section>
   <footer>
    <div class="footer-logo">
        <img src="images/pngtree-community-logo-people-icon-together-png-image_5395399.png" width="140px" height="120px"></a>
        <h2>TaskManger</h2>

    </div>
    <div class="footer-details">
        <h3>Address</h3> 
        <p>DeirBallut,Salfeet</p>
        <p>Copyright &copy;2023</p>
    </div>   
    <div class="footer-contact">
    <h3>Contact</h3>
    <p>Email:<a href="mailto:Company@gmail.com">Company@gmail.com</a></p>
    <p>Telephone:<a href="tel:0567841279">0567841279</a></p>
    </div>
    </footer> 
</body>
</html>