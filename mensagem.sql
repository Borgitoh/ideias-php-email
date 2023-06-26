CREATE DATABASE meu_banco_de_dados;

USE meu_banco_de_dados;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  email_verified BOOLEAN NOT NULL DEFAULT 0,
   verificationCode VARCHAR(5000)
);
