<?php 
  require 'validasasao.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tela de Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="container">
     <h2> <?php   
     session_start(); 
     echo $_SESSION['messagem'] ; ?></h2>
  
  <div class="login-google">
  <?php   
     if (  $_SESSION['idUser']){

      ?>
  <a href="Login.php">  <button> Login</button></a>
   <?php   
 
     } ?>
  </div>
</div>
</body>
</html>