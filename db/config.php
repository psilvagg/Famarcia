<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_farmacia";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
