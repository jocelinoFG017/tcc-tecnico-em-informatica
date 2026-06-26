<?php
include("../conexao/conexao.php");
// Seleciona todos os usuários
$sql = mysqli_query($conn, "SELECT * FROM produto ORDER BY idProduto;");
// Exibe as informações de cada usuário
while ($produto = mysqli_fetch_object($sql)) {
    // Exibimos a foto
    echo "<img src='../fotos/".$produto->foto."' alt='Foto de exibição' /><br />";
    // Exibimos o nome e email
    echo "<b>Nome:</b> " . $produto->nome . "<br />";
    echo "<b>Email:</b> " . $produto->preco . "<br /><br />";
}
?>