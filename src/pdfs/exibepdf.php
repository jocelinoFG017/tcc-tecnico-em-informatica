<?php
define('FPDF_FONTPATH', 'font/');
require('./fpdf/fpdf.php');

//conexão com banco de dados
include("../conexao/conexao.php");
// estrutura da tabela



//pesquisar na tabela
$sql=("SELECT nome,login FROM usuario "); //exibe o registro específico
$busca = mysqli_query($conn, $sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,"Relatorio",0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
//exibir imagem no pdf
// $pdf->Image('bat.png',10,5,18,21,'PNG');
//$pdf->Image('bat.jpg',10,8,22);
$pdf->ln(15); // espaçamento entra linhas de 15 mm

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70, 7,'Nome',1,0,"C");
$pdf->Cell(70, 7,'Login',1,0,"C");
$pdf->ln(); //nenhum espaçamentos entre linhas

while ($resultado = mysqli_fetch_array($busca)) {
    $pdf->Cell(70, 7, $resultado['nome'],1,0,"C");
    $pdf->Cell(70, 7, $resultado['login'],1,0,"C");
    $pdf->Ln();
    
}
$pdf->Output();
?>