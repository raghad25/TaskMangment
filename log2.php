
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
            <li><a href="contactus.html"> Contact us</a></li>
            <li><a href="" class="logout-btn "> Log out</a></li>

        </ul>
    </nav>
   </header>

   <section class="main">
   <section class="reg_form">
    <form method="post"action="#">
    <fieldset>
    <legend>Make an Account</legend>
    <label for="username">Your username</label>
                <input type="text" placeholder="Enter Username" name="uname" required>
    
                <br><br>
    
                <!-- Password -->
                <label for="pswrd">Your password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                <!-- Submit button -->
                 <button type="submit" name="finish">Finish</button>
    <br><br><br>
        
    
    </fieldset>

    </form>
   </section>
<?php
if(isset($_POST['finish'])){

    $username = $_POST['uname'];
    $password = $_POST['psw'];
 
try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = ("INSERT INTO log(username,password) VALUES(:username,:password)");
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password); 
    $done= $stmt->execute();

    if ($done){
        header("Location: welcom.php"); 
    } 
        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    
    }



?>
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