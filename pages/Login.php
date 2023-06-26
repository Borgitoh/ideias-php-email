<!DOCTYPE html>
<html>
<head>
  <title>Tela de Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="container">
  <h2>Login</h2>
  <form  action="../controller/loginController.php"  method="POST">
    <input type="text"  name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <div class="forgot-password">
      <a href="#">Esqueceu a senha?</a>
    </div>
    <button type="submit" name="login">Login</button>
  </form>
  <div class="login-google">
    <button> <a href="pages/registar.php">Registar</a></button>
  </div>
</div>
</body>
</html>