<?php
include_once("../../../conexao/conexao.php");

$sql = "SELECT * FROM categoria";

$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">

    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            $contador = 1;
            while ($dado = mysqli_fetch_array($resultado)) { ?>

                <tr>
                    <td><?= $contador++ ?></td>
                    <td><?= $dado["nome"] ?></td>
                    <td><?= $dado["descricao"] ?></td>
                    <td>
                        <div class="d-flex gap-2">

                            <button class="btn btn-sm btn-primary btn-editar"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditar"
                                data-id="<?= $dado['idCategoria'] ?>"
                                data-nome="<?= htmlspecialchars($dado['nome'], ENT_QUOTES) ?>"
                                data-descricao="<?= htmlspecialchars($dado['descricao'], ENT_QUOTES) ?>">

                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-sm btn-danger btn-excluir"
                                data-bs-toggle="modal"
                                data-bs-target="#modalExcluir"
                                data-id="<?= $dado['idCategoria'] ?>">

                                <i class="fas fa-trash-alt"></i>
                            </button>

                        </div>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalExcluir = document.getElementById('modalExcluir');

    modalExcluir.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');

        document.getElementById('btnExcluirConfirmado')
            .setAttribute('href', 'excluir.php?idCategoria=' + id);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        modalEditar.querySelector('#modal-idCategoria').value = button.getAttribute('data-id');
        modalEditar.querySelector('#modal-nome').value = button.getAttribute('data-nome');
        modalEditar.querySelector('#modal-descricao').value = button.getAttribute('data-descricao');
    });
});
</script>