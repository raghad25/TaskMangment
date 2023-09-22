<?php
   require_once("config.php");

try {
   $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo"Connection done";

  }
  catch (PDOException $e) {
   die( $e->getMessage() );
  }
  ?>
?>
?>
