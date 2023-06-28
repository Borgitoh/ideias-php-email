<?php
session_start();
require '../service/conexao.php';
require '../controller/messagemController.php';


    $idUser = $_SESSION['idUser'];
    $idministerio = $_POST['idministerio'];
    $assunto = $_POST['assunto'];
    $mensagem = htmlspecialchars($_POST['mensagem']);

    if (enviarMenssagem($assunto, $mensagem)) {
        // Inserir dados na tabela menssagem
        $sql = "INSERT INTO menssagem (assunto, texto, idUsuario, idMinisterio) VALUES ('$assunto', '$mensagem', $idUser, $idministerio)";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['messagem'] = 'Menssagem enviada com Sucesso';
            header('Location: ../pages/emailvalida.php');
        } else {
            echo "Erro ao inserir mensagem na tabela menssagem: " . $conn->error;
        }
    }
    header('Location: ../pages/messagem.php');


// Fechar a conexão com o banco de dados
$conn->close();
