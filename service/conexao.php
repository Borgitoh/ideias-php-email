<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meu_banco_de_dados";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
  die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
