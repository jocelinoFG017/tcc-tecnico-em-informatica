<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "tccjocelino";

	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ("Não foi possivel conectar");
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		return ;//echo "Conexao realizada com sucesso";
	}
?>
