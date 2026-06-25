<?php
include("../conexao/conexao.php");

$sql = "SELECT 
            c.idCidade, 
            c.nome AS cidade, 
            c.fk_idEstado, 
            est.idEstado, 
            est.nome AS estado
        FROM cidade AS c 
        JOIN estado AS est ON c.fk_idEstado = est.idEstado 
        ORDER BY c.idCidade";

$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($dado = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?= $dado["idCidade"]; ?></td>
                    <td><?= $dado["cidade"]; ?></td>
                    <td><?= $dado["estado"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>