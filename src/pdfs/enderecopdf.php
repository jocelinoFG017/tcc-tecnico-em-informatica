<?php 
define('FPDF_FONTPATH', 'font/');
require("./fpdf/fpdf.php");

//conexão com banco de dados
include("../conexao/conexao.php");

$sql=("SELECT en.idEndereco,c.nome as cidade, en.bairro, en.rua, en.numero, est.nome as estado, pai.nome as pais, en.telefone
from endereco as en
join cidade as c on en.idCidade = c.idCidade
join estado as est on en.idEstado = est.idEstado
join pais as pai on en.idPais = pai.idPais"); 
$busca = mysqli_query($conn, $sql);

$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,"Relatório de Endereços",0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);

// $pdf->Text(50,50,utf8_decode('Acentuação'));
//cabeçalho da tabela 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,20,'Cidade',1,0,"L");
$pdf->Cell(140,20,'Bairro',1,0,"L");
$pdf->Cell(100,20,'Rua',1,0,"L");
$pdf->Cell(100,20,'Numero',1,0,"L");
$pdf->Line(5,42,85,42);
$pdf->Cell(70,20,'Estado',1,0,"L");
$pdf->Cell(70,20,'Pais',1,0,"L");
$pdf->Cell(70,20,'Telefone',1,0,"L");
// $pdf->Cell(130,20,'Coluna 3',1,0,"L");
// $pdf->Cell(160,20,'Coluna 4',1,1,"L");
  $pdf->ln();
  // utf8_decode()
//linhas da tabela
$pdf->SetFont('arial','',12);
while ($resultado = mysqli_fetch_array($busca)) {
    $pdf->Cell(130,20,$resultado['cidade'],1,0,"L");
    $pdf->Cell(140,20,$resultado['bairro'],1,0,"L");
    $pdf->Cell(100,20,$resultado['rua'],1,0,"L");
    $pdf->Cell(100,20,$resultado['numero'],1,0,"L");
    //$pdf->Ln(30);
    $pdf->Cell(70,20,$resultado['estado'],1,0,"L");
    $pdf->Cell(70,20,$resultado['pais'],1,0,"L");
    $pdf->Cell(70,20,$resultado['telefone'],1,0,"L");
    $pdf->Ln();
    
}
//$pdf->Output("arquivo.pdf","D");
$pdf->Output();

?>