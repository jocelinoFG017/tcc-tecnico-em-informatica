<?php
include_once "../../conexao/conexao.php";

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

if ($pagina < 1) {
    $pagina = 1;
}

$registrosPorPagina = 10;
$inicio = ($pagina - 1) * $registrosPorPagina;

$sql = "SELECT
            c.idCidade,
            c.nome AS cidade,
            c.fk_idEstado,
            est.nome AS estado
        FROM cidade c
        INNER JOIN estado est
            ON c.fk_idEstado = est.idEstado
        ORDER BY c.idCidade
        LIMIT $inicio, $registrosPorPagina";

$resultado = mysqli_query($conn, $sql);
?>

<table class="table table-striped table-hover align-middle tabela-fixa">

    <thead class="table-dark">
        <tr>
            <th style="width: 80px;">#</th>
            <th style="width: 40%;">Cidade</th>
            <th style="width: 40%;">Estado</th>
            <th style="width: 120px;">Ações</th>
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
                        data-id="<?= $dado['idCidade'] ?>"
                        data-cidade="<?= htmlspecialchars($dado['cidade'], ENT_QUOTES) ?>"
                        data-estado="<?= $dado['fk_idEstado'] ?>">

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