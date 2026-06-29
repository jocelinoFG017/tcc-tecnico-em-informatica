<?php
include_once("../../conexao/conexao.php");

$porPagina = 10;

$sql = "SELECT COUNT(*) as total FROM cidade";
$res = mysqli_query($conn, $sql);
$total = mysqli_fetch_assoc($res)['total'];

$totalPaginas = ceil($total / $porPagina);

for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<li class='page-item'>
            <a href='#' class='page-link pagina-link' data-pagina='$i'>$i</a>
          </li>";
}