<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se a ação é um login ou registro
  if (isset($_POST['login'])) {
    // Lógica de autenticação de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Faça algo com os dados do usuário para autenticação (ex: verificar no banco de dados)

    // Verifica se os campos de usuário e senha são válidos
    if ($username === 'admin' && $password === 'senha') {
      // Login bem-sucedido
      echo 'Login realizado com sucesso!';
    } else {
      // Login inválido
      echo 'Usuário ou senha inválidos!';
    }
  } elseif (isset($_POST['register'])) {
    // Lógica de registro de usuário
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Faça algo com os dados do usuário para registro (ex: inserir no banco de dados)

    // Verifica se os campos de usuário, senha e e-mail são válidos
    if (strlen($username) >= 5 && strlen($password) >= 8 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Registro bem-sucedido
      echo 'Registro realizado com sucesso!';
    } else {
      // Dados inválidos
      echo 'Dados inválidos para registro!';
    }
  }
}
?>
