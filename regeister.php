
<?php  require_once("config.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regeister Now</title>
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
       <section class="reg_form">

        <section id="content">
       <form method="post" action=""enctype="multipart/form-data">
        <fieldset>
         <legend>Regestration</legend>
        
         <label for="name">Name:</label>
         <input type="text" placeholder="Enter your name" name="name" required>
         <br><br>

         <label for="idname">Identity Number:</label>
         <input type="text" placeholder="Enter your Identity Number" name="idname" required>
         <br><br>

         <label for="Nationality"> Nationality:</label>
         <input type="text" placeholder="Enter your  Nationality" name="Nationality" required>
         <br><br>

          
         <label for="add"> Address:</label>
         <input type="text" placeholder="Enter your Address" name="add" required>
         <br><br>

          
         <label for="phone"> phone num:</label>
         <input type="text" placeholder="Enter your phone number" name="phone" required>
         <br><br> 

         <label for="email">Email Address:</label>
         <input type="email" placeholder="Enter your email" name="email" required>

         <br><br>

         <label for="photo">Upload Photo:</label>
         <input type="file" name="photo" required>
         <?php
       if(isset($_FILES['photos'])) {
        $errors = array();
        $allowed_file_types = array("image/jpeg", "image/png", "image/gif");
     
        for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
           $file_name = $_FILES['photos']['name'][$i];
           $file_size = $_FILES['photos']['size'][$i];
           $file_tmp = $_FILES['photos']['tmp_name'][$i];
           $file_type = $_FILES['photos']['type'][$i];
     
           // Check if the file is an image
           if(!in_array($file_type, $allowed_file_types)) {
              $errors[] = $file_name . ': Invalid file type';
           }
           // Check if the file was uploaded correctly
           if($file_size > 2097152) {
              $errors[] = $file_name . ': File size must be less than 2 MB';
           }
     
           if(empty($errors) == true) {
              move_uploaded_file($file_tmp, "images/" . $file_name);
           } else {
              print_r($errors);
           }
        }
     }
     
         
         ?>
         <br><br>


         <label for="qualification">Qualification:</label><br>
         <textarea placeholder="Enter your qualification" name="qualification" required cols="11" rows="6"></textarea>
          <br><br>

          <label for="experience">Working Experience:</label><br>
          <textarea placeholder="Enter your working experience" name="experience" required cols="11" rows="6"></textarea>
          <br><br>
 
          <label for="cv">Upload CV:</label>
          <input type="file" name="cv" required>
          <?php
          
          if(isset($_FILES['cv'])) {
            $errors = array();
            $allowed_file_types = array("application/pdf", "application/msword");
         
            for($i = 0; $i < count($_FILES['cv']['name']); $i++) {
               $file_name = $_FILES['cv']['name'][$i];
               $file_size = $_FILES['cv']['size'][$i];
               $file_tmp = $_FILES['cv']['tmp_name'][$i];
               $file_type = $_FILES['cv']['type'][$i];
         
               // Check if the file is a document
               if(!in_array($file_type, $allowed_file_types)) {
                  $errors[] = $file_name . ': Invalid file type';
               }
               // Check if the file was uploaded correctly
               if($file_size > 2097152) {
                  $errors[] = $file_name . ': File size must be less than 2 MB';
               }
         
               if(empty($errors) == true) {
                  move_uploaded_file($file_tmp, "docs/" . $file_name);
               } else {
                  print_r($errors);
               }
            }
         }
         
          
          
          
          
          ?>
          <br><br>
          <button type="submit" name="next">Next</button>
        </fieldset>
       </form>
       </section>
</section>

<?php 
// $sql = "INSERT INTO member (name, identity_number, nationality, address, email, photo, qualification, experience, cv) 
// VALUES (:name, :idname, :Nationality, :add, :email, :photo, :qualification, :experience, :cv)";

if(isset($_POST['next'])){
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO member_details (name, identity_number, nationality, address, mobile_number, email, photo, qualification, work_experience, cv) 
VALUES (:name, :idname, :Nationality, :add,:phone, :email, :photo, :qualification, :experience, :cv)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $_POST['name']);
$stmt->bindValue(':idname', $_POST['idname']);
$stmt->bindValue(':Nationality', $_POST['Nationality']);
$stmt->bindValue(':add', $_POST['add']);
$stmt->bindValue(':phone', $_POST['phone']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':photo', $_POST['photo']);
$stmt->bindValue(':qualification', $_POST['qualification']);
$stmt->bindValue(':experience', $_POST['experience']);
$stmt->bindValue(':cv', $_POST['cv']);
$done= $stmt->execute();
    if ($done){
        header("Location: log2.php"); 
    } 
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}




?>


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