<?php
//Configuração Geral
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estoque";

//Conexão
$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario, $senha);

?>