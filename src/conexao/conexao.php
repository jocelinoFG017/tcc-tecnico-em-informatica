<?php
$servidor = getenv('DB_HOST');
$usuario  = getenv('DB_USER');
$senha    = getenv('DB_PASS');
$dbname   = getenv('DB_NAME');

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Não foi possivel conectar");

if (!$conn) {
    error_log("Erro MySQL: " . mysqli_connect_error());
    die("Erro ao conectar com o banco de dados.");
}
