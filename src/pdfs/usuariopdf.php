<?php 
define('FPDF_FONTPATH', 'font/');
require("./fpdf/fpdf.php");

//conexão com banco de dados
include("../conexao/conexao.php");

$sql=("SELECT nome,login FROM usuario "); 
$busca = mysqli_query($conn, $sql);

$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,iconv('UTF-8','ISO-8859-1//TRANSLIT',"Relatório de Usuários"),0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);

// $pdf->Text(50,50,utf8_decode('Acentuação'));
//cabeçalho da tabela 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,20,'Nome',1,0,"L");
$pdf->Cell(140,20,'Login',1,0,"L");
// $pdf->Cell(130,20,'Coluna 3',1,0,"L");
// $pdf->Cell(160,20,'Coluna 4',1,1,"L");
  $pdf->ln();
//linhas da tabela
$pdf->SetFont('arial','',12);
while ($resultado = mysqli_fetch_array($busca)) {
    $pdf->Cell(130,20,iconv('UTF-8','ISO-8859-1//TRANSLIT',$resultado['nome']),1,0,"L");
    $pdf->Cell(140,20,iconv('UTF-8','ISO-8859-1//TRANSLIT',$resultado['login']),1,0,"L");
    $pdf->Ln();
}
//$pdf->Output("arquivo.pdf","D");
$pdf->Output();

?>