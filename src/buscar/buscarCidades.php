<?php
include("../conexao/conexao.php");

if(isset($_GET['estadoId'])){
    $estadoId = intval($_GET['estadoId']);

    $sql = "SELECT idCidade, nome FROM cidade WHERE idEstado = $estadoId ORDER BY nome";
    $result = mysqli_query($conn, $sql);

    echo '<option value="">Selecione a cidade</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['idCidade'].'">'.$row['nome'].'</option>';
    }
}
?>
