<?php 
define('FPDF_FONTPATH', 'font/');
require("./fpdf/fpdf.php");

//conexão com banco de dados
include("../conexao/conexao.php");

$sql=("SELECT * FROM produto"); 
$busca = mysqli_query($conn, $sql);

$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,"Relatório de Produtos",0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);

// $pdf->Text(50,50,utf8_decode('Acentuação'));
//cabeçalho da tabela 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,20,'Nome',1,0,"L");
$pdf->Cell(140,20,'Descrição',1,0,"L");
$pdf->Cell(100,20,'Marca',1,0,"L");
$pdf->Cell(100,20,'Quantidade',1,0,"L");
$pdf->Cell(70,20,'Preço R$',1,0,"L");
// $pdf->Cell(130,20,'Coluna 3',1,0,"L");
// $pdf->Cell(160,20,'Coluna 4',1,1,"L");
  $pdf->ln();
  // utf8_decode()
//linhas da tabela
$pdf->SetFont('arial','',12);
while ($resultado = mysqli_fetch_array($busca)) {
    $pdf->Cell(130,20,$resultado['nome'],1,0,"L");
    $pdf->Cell(140,20,$resultado['descricao'],1,0,"L");
    $pdf->Cell(100,20,$resultado['marca'],1,0,"L");
    $pdf->Cell(100,20,$resultado['quantidade'],1,0,"L");
    $pdf->Cell(70,20,$resultado['preco'],1,0,"L");
    $pdf->Ln();
}
//$pdf->Output("arquivo.pdf","D");
$pdf->Output();

?>