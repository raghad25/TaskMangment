<?php require_once("config.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/main.css" />
    <style>
        td {
  width: 100px;
  height: 100px;
  overflow: hidden;
}

td img {
  width: 100%;
  height: auto;
  border-radius: 50%;
} 
    </style>
</head>
<body>
    <header>
    
        <nav class="headr_nav">
            <div class="logo">
                <img src="images/pngtree-community-logo-people-icon-together-png-image_5395399.png" width="140px" height="120px"></a>
                <h1>task manger</h1>
            </div>
            <ul>
                <li><a href="aboutus.php">About us</a></li>
                <li><a href="contactus.php"> Contact us</a></li>
                <li><a href="" class="logout-btn "> Log out</a></li>
    
            </ul>
        </nav>
       </header>
<section id="nav2">
       <nav class="breadcrumb">
        <ul>
        <li ><a class="breadcrumb-item" href="main.php">Home</a></li>>>
        <li><a class="breadcrumb-item" href="search.php">Search page</a></li>>>
        <li><a class="breadcrumb-item" href="add.php">Add new task</a></li>>>
        <li><a class="breadcrumb-item" href="Ltask.php">Late tasks</a></li>>>
        <li><a class="breadcrumb-item" href="ptask.php"> Pending tasks</a></li>>>
        <li><a class="breadcrumb-item" href="atask.php"> Active tasks</a></li>
        </ul>
       </nav>

  </section>

<section id="content">
<section id="nleft">
    <nav class="left"> 
        <ul >
         <li ><a href="main.php">Home</a></li>
         <li><a href="search.php">Search page</a></li>
         <li><a href="add.php">Add new task</a></li>
         <li><a href="Ltask.php">Late tasks</a></li>
         <li><a href="ptask.php"> Pending tasks</a></li>
         <li><a href="atask.php"> Active tasks</a></li>
        </ul>
 
        </nav>

</section>
<?php 
 try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT task.title, member_details.photo, task.priority, task.status FROM task JOIN member_details  ON task.`ass-to` = member_details.id  and 
    task.`as-member` = member_details.id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>

<section id="tab">
 
        <table>
            <caption>TASK INFORMATION</caption>
            <tr>
            <th>task title</th>
            <th>sender</th>
            <th>receiver </th>
            <th>priority</th>
            <th>Status</th>
            <th>links</th>
            </tr>
            <tbody>
            <?php foreach ($results as $row) { ?>
      <tr>
        <td><?php echo $row['title']; ?></td>
        <td><img src="data:image/png;base64,<?php echo base64_encode(($row['photo'])); ?>" /></td>
        <td><img src="data:image/jpeg;base64,<?php echo base64_encode(($row['photo'])); ?>" /></td>
        <td><?php echo $row['priority']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><a href="detail.php" class="logout-btn ">view detalis</td>

      </tr>
    <?php } ?>
  </tbody>

        </table>
    
     </section>

</section>
<?php


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