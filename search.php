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
    <link rel="stylesheet" href="css/search.css">
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

<?php ?>
<section id="tab">

    <h2>Search page</h2>

    <input type="text" id="myInput" placeholder=" Filter tasks by date, priority, status, or member name" title="Type in a name">
    
        <table>
            <!-- <caption>TASK INFORMATION</caption> -->
            <tr>
            <th>task title</th>
            <th>start date</th>
            <th>end date</th>
            <th>receiver </th>
            <th>priority</th>
            <th>Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>

        </table>
    
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