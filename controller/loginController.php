<?php
require '../service/conexao.php';
require '../controller/messagemController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se a ação é um login ou registro
  if (isset($_POST['login'])) {
    // Lógica de autenticação de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Faça algo com os dados do usuário para autenticação (ex: verificar no banco de dados)
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Verifica se o usuário foi encontrado no banco de dados
  } 
  elseif (isset($_POST['register'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      echo 1;

    if (strlen($username) >= 5 && strlen($password) >= 8 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $verificationCode = generateVerificationCode();
      // Insere os dados do usuário no banco de dados
      echo 2;
      $sql = "INSERT INTO usuarios (username, password, email, verificationCode) VALUES ('$username', '$password', '$email','$verificationCode')";
      echo 3;
      if ($conn->query($sql) === TRUE) {
        echo 4;
        if (Enviarcoderash($email, $username, $verificationCode))
          echo 'Registro realizado com sucesso!';
        else
          echo 'erro gerar codigo de validação';
      } else {
        echo 5;
        echo 'Erro ao registrar usuário: ' . $conn->error;
      }
    } else {
      echo 6;
      echo 'Dados inválidos para registro!';
    }
  }
}

function generateVerificationCode()
{
  $code = uniqid();
  $verificationCode = md5($code);
  return $verificationCode;
}
function  Enviarcoderash($email, $username, $verificationCode)
{

  $verificationLink = "http://seusite.com/verify.php?code=$verificationCode";
  $message = "Olá $username,\n\nPor favor, clique no link abaixo para verificar seu email:\n$verificationLink";

  emailValidacao($email, $message);
}
