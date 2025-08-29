<?php 
define('FPDF_FONTPATH', 'font/');
require("./fpdf/fpdf.php");
include("../conexao/conexao.php");

$sql=("SELECT en.idEndereco, en.bairro, en.rua, en.numero ,en.telefone, c.nome as cidade, est.uf as estado
from endereco as en
join cidade as c on en.fk_idCidade = c.idCidade
JOIN estado as est on c.fk_idEstado = est.idEstado"); 
$busca = mysqli_query($conn, $sql);

$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,iconv('UTF-8','ISO-8859-1//TRANSLIT',"Relatório de Endereços"),0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);

// Cabeçalho da tabela
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,20,'Cidade',1,0,"L");
$pdf->Cell(120,20,'Bairro',1,0,"L");
$pdf->Cell(100,20,'Rua',1,0,"L");
$pdf->Cell(70,20,'Numero',1,0,"L");
$pdf->Line(5,42,85,42);
$pdf->Cell(110,20,'Telefone',1,0,"L");
$pdf->Cell(30,20,'UF',1,0,"L");
$pdf->ln();
$pdf->SetFont('arial','',10);

while ($resultado = mysqli_fetch_array($busca)) {
    $pdf->Cell(100,20,$resultado['cidade'],1,0,"L");
    $pdf->Cell(120,20,$resultado['bairro'],1,0,"L");
    $pdf->Cell(100,20,$resultado['rua'],1,0,"L");
    $pdf->Cell(70,20,$resultado['numero'],1,0,"L");
    $pdf->Cell(110,20,$resultado['telefone'],1,0,"L");
    $pdf->Cell(30,20,$resultado['estado'],1,0,"L");
    $pdf->Ln();
    
}
$pdf->Output();
?>