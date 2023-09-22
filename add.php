<?php  require_once("config.php");?>
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
    <link rel="stylesheet" href="css/add.css"/>
    <style>.error-field {
    background-color: #ffb3b3;
  }
  
  .error {
    display: none;
    color: #ff0000;
    font-size: 12px;
    margin-top: 5px;
  }
  
  .error-visible {
    display: block;
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
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="contactus.php"> Contact us</a></li>
                <li><a href="Login.php" class="logout-btn "> Log out</a></li>
    
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



<section id="tab">

    <h2>Add  tasks</h2>

    <form method="post" ACTION="">

        <div>
          <label for="task_title">Task Title:</label>
          <input type="text" id="task_title" name="task_title" required
          <?php if (empty($task_title) && !empty($error_msg)) echo 'class="error-field"'; ?>>
          <div class="error"
    <?php if (empty($task_title) && !empty($error_msg)) echo 'class="error-visible"'; ?>>
    This field is required
  </div>

        <div>
          <label for="task_description">Task Description:</label>
          <textarea id="task_description" name="task_description"></textarea>
        </div>


        <div>
          <label for="start_date">Start Date:</label>
          <input type="date" id="start_date" name="start_date" required
           <?php if (empty($start_date) && !empty($error_msg)) echo 'class="error-field"'; ?>>
          <div class="error"<?php if (empty($start_date) && !empty($error_msg)) echo 'class="error-visible"'; ?>>
        
          This field is required

        </div>


        <div>
          <label for="due_date">Due/End Date:</label>
          <input type="date" id="due_date" name="due_date" required
          <?php if (empty($due_date) && !empty($error_msg)) echo 'class="error-field"'; ?>>
          <div class="error"<?php if (empty($due_date) && !empty($error_msg)) echo 'class="error-visible"'; ?>>
   

        </div>

        <div>
          <label for="priority">Priority:</label>
          <select id="priority" name="priority">
            <option value="low">Low</option>
            <option value="Medium">Medium</option>
            <option value="high">High</option>
          </select>
        </div>

        <div>
          <label for="status">status:</label>
          <select id="status" name="status">
            <option value="Pending">Pending</option>
          
          </select>
        </div>


        <div>
        <label for="assigned_to">Assigned-to member:</label>
        <select id="assigned_to" name="assigned_to" required>
          <option value=""> Assigned-to member </option>


          <?php
       

         try {
               $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $pdo->prepare("SELECT id, name FROM member_details");
               $stmt->execute();
               while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               echo "<option value='".$row['id']."'>".$row['name']."</option>";
              echo 'connection done';
            }
         }
         catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
  }
?>
</select>
</div>

        <div>
          <label for="assigned_by">Assigned By:</label>
          <select id="assigned_by" name="assigned_by" required>
          <option value=""> Assigning member</option>
          <?php
       
         try {
               $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $pdo->prepare("SELECT id, name FROM member_details");
               $stmt->execute();
               while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               echo "<option value='".$row['id']."'>".$row['name']."</option>";
              echo 'connection done';
            }
         }
         catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
  }
        ?>
        
      </div>
        <input type="submit"name="insert" value="insert">
      </form>
      <?php

if(isset($_POST['insert'])){

  $task_title = $_POST['task_title'];
  $task_description = $_POST['task_description'];
  $start_date = $_POST['start_date'];
  $due_date = $_POST['due_date'];
  $priority = $_POST['priority'];
  $assigned_to = $_POST['assigned_to'];
  $assigned_by = $_POST['assigned_by'];
  $statuss = (isset($_POST['status'])) ? $_POST['status'] : "";
  $error_msg = "";

  if (empty($task_title)) {
    $error_msg .= "Task title is required.<br>";
  }
  if (empty($start_date)) {
    $error_msg .= "Start date is required.<br>";
  }
  if (empty($due_date)) {
    $error_msg .= "Due date is required.<br>";
  }
  if (empty($assigned_to)) {
    $error_msg .= "Assigned to member is required.<br>";
  }

  if (empty($error_msg)) {

  try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO task (title, description, startdate, enddate, priority, `ass-to`, `as-member`,status) 
            VALUES(:task_title, :task_description, :start_date, :due_date, :priority, :assigned_to, :assigned_by, :statuss)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':task_title', $task_title);
    $stmt->bindValue(':task_description', $task_description);
    $stmt->bindValue(':start_date', $start_date);
    $stmt->bindValue(':due_date', $due_date);
    $stmt->bindValue(':priority', $priority);
    $stmt->bindValue(':assigned_to', $assigned_to);
    $stmt->bindValue(':assigned_by', $assigned_by);
    $stmt->bindValue(':statuss', $statuss);
    $done= $stmt->execute();
    if ($done){
    echo "Data inserted successfully"; 
    } 
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }  } else {
    echo $error_msg;

}
}

?>

    
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