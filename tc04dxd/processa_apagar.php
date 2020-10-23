<?php
	include_once("conexao/conexao.php");
	
	$id = $_GET['ID'];
	
	$result_cursos = "DELETE FROM usuarios WHERE ID = '$id'";
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tc04dxd/usuarios2.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhos/tc04dxd/usuarios2.php'>
				<script type=\"text/javascript\">
					alert(\" Usuário não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>