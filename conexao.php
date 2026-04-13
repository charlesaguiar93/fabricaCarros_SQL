<?php

//Parâmetro 1 : localhost -> endereço do server de bd
//Parâmetro 2: "root"     -> nome do usuário do MySQL
//Parâmetro 3: ""         -> senha do usuário do MySQL
//Parâmetro 4: "crud"     -> nome do banco de dados

//$conn = mysqli_connect("localhost", "root", "", "crud_simples");


/* Parâmetros de conexão */
$host = "localhost";
$db = "crud_simples";
$user = "root";
$pass = ""; 

/* Conexão com o banco de dados para usar $pdo */
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}



?>