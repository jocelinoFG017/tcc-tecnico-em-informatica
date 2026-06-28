<?php
include("../../conexao/conexao.php");

$sql = "SELECT * FROM produto";
$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">

    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Marca</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ação</th>
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
                    <td><?= $dado["marca"] ?></td>
                    <td><?= $dado["quantidade"] ?></td>
                    <td>R$ <?= number_format($dado["preco"], 2, ',', '.') ?></td>

                    <td>
                        <div class="d-flex gap-2">

                            <button class="btn btn-sm btn-primary btn-editar"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditar"

                                data-id="<?= $dado['idProduto'] ?>"
                                data-nome="<?= htmlspecialchars($dado['nome'], ENT_QUOTES) ?>"
                                data-descricao="<?= htmlspecialchars($dado['descricao'], ENT_QUOTES) ?>"
                                data-marca="<?= htmlspecialchars($dado['marca'], ENT_QUOTES) ?>"
                                data-quantidade="<?= $dado['quantidade'] ?>"
                                data-preco="<?= $dado['preco'] ?>">

                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-sm btn-danger btn-excluir"
                                data-bs-toggle="modal"
                                data-bs-target="#modalExcluir"
                                data-id="<?= $dado['idProduto'] ?>">

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
            .setAttribute('href', 'excluir.php?idProduto=' + id);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        modalEditar.querySelector('#modal-idProduto').value = button.getAttribute('data-id');
        modalEditar.querySelector('#modal-nome').value = button.getAttribute('data-nome');
        modalEditar.querySelector('#modal-descricao').value = button.getAttribute('data-descricao');
        modalEditar.querySelector('#modal-marca').value = button.getAttribute('data-marca');
        modalEditar.querySelector('#modal-quantidade').value = button.getAttribute('data-quantidade');
        modalEditar.querySelector('#modal-preco').value = button.getAttribute('data-preco');
    });
});
</script>