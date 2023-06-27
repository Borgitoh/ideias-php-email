<?php

echo $_GET['code'];
$codigo = $_GET['code'];
session_start();
require '../service/conexao.php';


$sql = "SELECT * FROM usuarios WHERE verificationCode = '$codigo'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $_SESSION['user'] =  $row['username'];
    $sql = "UPDATE usuarios SET email_verified = 1 WHERE id = $id";
    $result = $conn->query($sql);

    $_SESSION['messagem'] = 'O seu Emial foi validado com sucesso!
                             <br> por favor fazer login';

    header('Location: ../pages/emailvalida.php');
}
