<?php
session_start();
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
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['idUser'] = $row['id'];
      $_SESSION['user'] =  $row['username'];
      $_SESSION['emailVerified'] = $row['email_verified'];
      if($_SESSION['emailVerified'] ==0){
        $_SESSION['messagem'] = 'Por favor fazer a validação do teu email para ter acesso ao sistema';
        header('Location: ../pages/emailvalida.php');
      }else{
        header('Location: ../pages/home.php');
      }
        
    } else {
      // Login inválido
      $_SESSION['messagem'] = 'Usuário ou senha inválidos!';
     header('Location: ../pages/emailvalida.php');
    }

    // Verifica se o usuário foi encontrado no banco de dados
  } 
  elseif (isset($_POST['register'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
     
    if (strlen($username) >= 5 && strlen($password) >= 8 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $verificationCode = generateVerificationCode();
      // Insere os dados do usuário no banco de dados
     
      $sql = "INSERT INTO usuarios (username, password, email, verificationCode) VALUES ('$username', '$password', '$email','$verificationCode')";
      
      if ($conn->query($sql) === TRUE) {
      
        if (Enviarcoderash($email, $username, $verificationCode)){
          $_SESSION['messagem'] = 'Registro realizado com sucesso! <br>
          Foi enviar um e-mail para fazer validação do teu registro';
        // header('Location: ../pages/emailvalida.php');
        }
        else{
          $_SESSION['messagem'] = 'erro gerar codigo de validação';
         //header('Location: ../pages/emailvalida.php');
        }
       
      } else {
        
        $_SESSION['messagem'] = 'Erro ao registrar usuário: ' . $conn->error;
       header('Location: ../pages/emailvalida.php');
      }
    } else {
      $_SESSION['messagem'] ='Dados inválidos para registro!';
     header('Location: ../pages/emailvalida.php');
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
  $verificationLink = "http://localhost//ideias-php-email/pages/VerificationCode.php?code=$verificationCode";
  $message = "Olá $username,\n\nPor favor, clique no link abaixo para verificar seu email:\n$verificationLink";

  if(emailValidacao($email, $message)){
    return true;
  }
   else
   return false;  
}