CREATE DATABASE IF NOT EXISTS sistema_farmacia;
USE sistema_farmacia;

CREATE TABLE IF NOT EXISTS adm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL 
);

INSERT INTO adm (usuario, senha) VALUES ('admin', 'admin');

-- Tabela de medicamentos
CREATE TABLE medicamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL, -- Use DECIMAL ou FLOAT
    quantidade INT NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    validade DATE NOT NULL
);
