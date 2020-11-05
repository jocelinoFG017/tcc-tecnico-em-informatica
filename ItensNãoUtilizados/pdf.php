<?php	

	include_once("../conexao/conexao.php");
zz	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>#</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Login</th>';
	$html .= '<th>Senha</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT * FROM usuario";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['idUsuario'] . "</td>";
		$html .= '<td>'.$row_transacoes['nome'] . "</td>";
		$html .= '<td>'.$row_transacoes['login'] . "</td>";
		$html .= '<td>'.$row_transacoes['senha'] . "</td></tr>";
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Celke - Relatório de Usuarios</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_usuarios.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>