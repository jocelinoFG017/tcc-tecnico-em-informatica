<?php
include_once("../../../login/verificaAdmin.php");
include_once("../../../conexao/conexao.php");

$sql = "SELECT * FROM vacina ORDER BY idVacina DESC";
$resultado = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacinas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>

<?php include_once("../../../includes/headerDash.php"); ?>

<div class="d-flex">

    <?php include_once("../../sidebar/sidebar.php"); ?>

    <div id="content" class="content flex-grow-1">

        <div class="container mt-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>💉 Vacinas</h3>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
                    <i class="fas fa-plus"></i> Nova Vacina
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($v = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?= $v['idVacina'] ?></td>
                                <td><?= htmlspecialchars($v['nome']) ?></td>

                                <td>
                                    <button class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir"
                                        data-id="<?= $v['idVacina'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<!-- MODAL CADASTRAR -->
<div class="modal fade" id="modalCadastrar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="cadastrar.php">

                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Vacina</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="text" name="nome" class="form-control" placeholder="Nome da vacina" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" name="cadastrar">Salvar</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modalExcluir" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Excluir Vacina</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Tem certeza que deseja excluir?
            </div>

            <div class="modal-footer">
                <a id="btnExcluir" class="btn btn-danger">Excluir</a>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("modalExcluir");

    modal.addEventListener("show.bs.modal", function (event) {
        const id = event.relatedTarget.getAttribute("data-id");

        document.getElementById("btnExcluir")
            .href = "excluir.php?id=" + id;
    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/js/sidebar.js"></script>

</body>
</html>