<?php
	$servidor = "banco-tcc-informatica";
	$usuario = "admin";
	$senha = "123456";
	$dbname = "tccjocelino";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ("Não foi possivel conectar");
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		return;
	}
?>
