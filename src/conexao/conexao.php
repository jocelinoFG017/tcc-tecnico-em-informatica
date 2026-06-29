<?php
$servidor = getenv('DB_HOST');
$usuario  = getenv('DB_USER');
$senha    = getenv('DB_PASS');
$dbname   = getenv('DB_NAME');

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Não foi possivel conectar");
if (!$conn) {
	die("Falha na conexao: " . mysqli_connect_error());
} else {
	return;
}
