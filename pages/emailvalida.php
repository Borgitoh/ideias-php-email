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
    <button> <a href="Login.php">Login</a></button>
  </div>
</div>
</body>
</html>