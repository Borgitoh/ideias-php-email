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

CREATE TABLE ministerio (
  idministerio INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  descricao VARCHAR(5000) NOT NULL
);

CREATE TABLE menssagem (
  idMessagem INT AUTO_INCREMENT PRIMARY KEY,
  assunto VARCHAR(255) NOT NULL,
  texto VARCHAR(5000) NOT NULL,
  idUsuario INT NOT NULL,
  idMinisterio INT NOT NULL,
 data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idUsuario) REFERENCES usuarios (id),
  FOREIGN KEY (idMinisterio) REFERENCES ministerio (idministerio)
);

INSERT INTO `ministerio` (`idministerio`, `titulo`, `descricao`) VALUES
( 'MINFIN', ' Ministério das Finanças'),
( 'MASFAMU', 'Ministério da Acção Social, Família e Promoção da Mulher'),
( 'MCTA', ' Ministério da Cultura e Turismo'),
( 'MININT', ' Ministério do Interior'),
( 'MINTRANS', 'Ministério dos Transportes'),
( 'MESCTI', ' Ministério do Ensino Superior, Ciência, Tecnologia e Inovação'),
( 'MIREX', 'Ministério das Relações Exteriores'),
( 'MINSA', 'Ministério da Saúde');

drop table usuarios;

select * from menssagem;


