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
    if ($result->num_rows > 0) {
     // Lógica de registro de usuário
     $username = $_POST['username'];
     $password = $_POST['password'];
     $email = $_POST['email'];
 
     // Verifica se os campos de usuário, senha e e-mail são válidos
     if (strlen($username) >= 5 && strlen($password) >= 8 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $verificationCode = generateVerificationCode();
       // Insere os dados do usuário no banco de dados
       $sql = "INSERT INTO usuarios (username, password, email, verificationCode) VALUES ('$username', '$password', '$email','$verificationCode')";
       
       if ($conn->query($sql) === TRUE) {
         // Registro bem-sucedido
       
         if(Enviarcoderash($email, $username, $verificationCode))
         echo 'Registro realizado com sucesso!';
         else
         echo 'erro gerar codigo de validação';
       } else {
         // Erro ao inserir no banco de dados
         echo 'Erro ao registrar usuário: ' . $conn->error;
       }
     } else {
       // Dados inválidos
       echo 'Dados inválidos para registro!';
     }
   }
  }
}

function generateVerificationCode() {
  $code = uniqid();
  $verificationCode = md5($code);
  return $verificationCode;
}
function  Enviarcoderash($email, $username, $verificationCode) {

 
  // Função para gerar um código de verificação
  $verificationLink = "http://seusite.com/verify.php?code=$verificationCode"; 
  $message = "Olá $username,\n\nPor favor, clique no link abaixo para verificar seu email:\n$verificationLink";
  
  emailValidacao($email,$message);
}
