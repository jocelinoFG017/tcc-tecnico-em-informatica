<?php
include("../conexao/conexao.php");

$sql = "SELECT en.idEndereco, en.bairro, en.rua, en.numero, en.telefone, en.fk_idCidade, c.nome as cidade, est.nome as estado
        FROM endereco AS en
        JOIN cidade AS c ON en.fk_idCidade = c.idCidade
        JOIN estado AS est ON c.fk_idEstado = est.idEstado
        ORDER BY en.idEndereco";

$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Telefone</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($dado = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?= $dado["idEndereco"]; ?></td>
                    <td><?= $dado["cidade"]; ?></td>
                    <td><?= $dado["bairro"]; ?></td>
                    <td><?= $dado["rua"]; ?></td>
                    <td><?= $dado["numero"]; ?></td>
                    <td><?= $dado["telefone"]; ?></td>
                    <td><?= $dado["estado"]; ?></td>

                    <td>
                        <button class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modalExcluir"
                                data-id="<?= $dado['idEndereco']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalEl = document.getElementById('modalExcluir');

    modalEl.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');

        const btnConfirm = document.getElementById('btnExcluirConfirmado');

        btnConfirm.setAttribute(
            'href',
            '../Excluir/excluirEndereco.php?idEndereco=' + id
        );

    });

});
</script>