CREATE DATABASE IF NOT EXISTS sistema_farmacia;
USE sistema_farmacia;

CREATE TABLE IF NOT EXISTS adm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL 
);

INSERT INTO adm (usuario, senha) VALUES ('admin', 'admin');

CREATE TABLE medicamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL, 
    quantidade INT NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    validade DATE NOT NULL
);

INSERT INTO medicamentos (nome, preco, quantidade, categoria, validade) VALUES
('Venvanse 30mg', 499.00, 10, 'Analgésico', '2026-11-10'),
('Annita', 50.00, 2, 'Analgésico', '2025-09-20'),
('ZeImage', 500.00, 1, 'Analgésico', '2031-02-15'),
('Paracetamol', 10.00, 50, 'Antipirético', '2025-05-15'),
('Ibuprofeno', 25.00, 20, 'Anti-inflamatório', '2024-10-01'),
('Amoxicilina', 75.00, 30, 'Antibiótico', '2027-03-30'),
('Captopril', 150.00, 25, 'Antihipertensivo', '2024-12-01'),
('Omeprazol', 20.00, 15, 'Antiacido', '2025-08-25'),
('Dipirona', 5.00, 100, 'Analgésico', '2023-10-10'),
('Ranitidina', 30.00, 50, 'Antiacido', '2026-01-15'),
('Clonazepam', 45.00, 40, 'Ansiolítico', '2024-09-18'),
('Loratadina', 12.00, 35, 'Antialérgico', '2025-07-30'),
('Metformina', 35.00, 20, 'Antidiabético', '2025-06-20'),
('Losartana', 80.00, 18, 'Antihipertensivo', '2024-11-12'),
('Simvastatina', 100.00, 12, 'Anticolesterol', '2024-10-05');
