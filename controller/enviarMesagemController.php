<?php
session_start();
require '../service/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_SESSION['idUser'];
    //$idUser = $_SESSION['idUser'] ;
    $idministerio = $_POST['idministerio'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Inserir dados na tabela menssagem
    $sql = "INSERT INTO menssagem (assunto, texto, idUsuario, idMinisterio) VALUES ('$assunto', '$mensagem', $idUser, $idministerio)";

    if ($conn->query($sql) === TRUE) {
        echo "Mensagem inserida com sucesso na tabela menssagem.";
    } else {
        echo "Erro ao inserir mensagem na tabela menssagem: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
