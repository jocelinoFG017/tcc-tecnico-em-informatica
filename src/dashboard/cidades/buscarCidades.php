<?php
include_once("../../conexao/conexao.php");

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

if ($pagina < 1) $pagina = 1;

$inicio = ($pagina - 1) * $porPagina;

$sql = "SELECT
            c.idCidade,
            c.nome AS cidade,
            est.nome AS estado
        FROM cidade c
        INNER JOIN estado est ON c.fk_idEstado = est.idEstado
        ORDER BY c.idCidade
        LIMIT $inicio, $porPagina";

$resultado = mysqli_query($conn, $sql);
?>

<table class="table table-striped table-hover align-middle">

    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td><?= $dado["idCidade"] ?></td>
                <td><?= htmlspecialchars($dado["cidade"]) ?></td>
                <td><?= htmlspecialchars($dado["estado"]) ?></td>

                <td>
                    <button class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditar"
                        data-id="<?= $dado['idCidade'] ?>">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalExcluir"
                        data-id="<?= $dado['idCidade'] ?>">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>