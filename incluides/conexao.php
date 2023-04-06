<?php
$host = 'localhost';
$user = 'root';
$pass = '1';
$dbname = 'restaurante';
$port = '3306';
try {
    // conexao com a porta
    // $con = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    // conexao sem a porta
    $con = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    // echo "Conexão com o banco de dados realizada com sucesso.";
} catch (PDOException $err) {
    die("Erro: Conexão com o banco de dados não realizado cm sucesso. erro gerado" . $err->getMessage());
}
