<?php
include("../../conexao/conexao.php");

$sql = "SELECT 
            artigo.idArtigo,
            artigo.titulo,
            artigo.texto,
            artigo.data_publicacao,
            usuario.nome AS autor
        FROM artigo
        INNER JOIN usuario 
            ON artigo.fk_idUsuario = usuario.idUsuario";
$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">

    <table class="table table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Tags</th>
                <th>Data de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($dado = mysqli_fetch_array($resultado)) { ?>

                <tr>
                    <td><?= $dado["idArtigo"]; ?></td>
                    <td><?= $dado["titulo"]; ?></td>
                    <td><?= $dado["autor"]; ?></td>

                    <td>
                        <!-- tags ainda não implementadas corretamente -->
                        -
                    </td>

                    <td>
                        <?= date('d/m/Y', strtotime($dado["data_publicacao"])); ?>
                    </td>

                    <td>
                        <div class="d-flex gap-2">

                            <button
                                class="btn btn-sm btn-primary btn-editar"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditar"
                                data-id="<?= $dado['idArtigo'] ?>"
                                data-titulo="<?= htmlspecialchars($dado['titulo'], ENT_QUOTES) ?>"
                                data-autor="<?= htmlspecialchars($dado['autor'], ENT_QUOTES) ?>"
                                data-data="<?= $dado['data_publicacao'] ?>">

                                <i class="fas fa-edit"></i>
                            </button>

                            <button
                                class="btn btn-sm btn-danger btn-excluir"
                                data-bs-toggle="modal"
                                data-bs-target="#modalExcluir"
                                data-id="<?= $dado['idArtigo'] ?>">

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
    document.addEventListener('DOMContentLoaded', function() {
        const modalExcluir = document.getElementById('modalExcluir');

        modalExcluir.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');

            document.getElementById('btnExcluirConfirmado')
                .setAttribute('href', 'excluir.php?idArtigo=' + id);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalEditar = document.getElementById('modalEditar');

        modalEditar.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            modalEditar.querySelector('#modal-idArtigo').value = button.getAttribute('data-id');
            modalEditar.querySelector('#modal-titulo').value = button.getAttribute('data-titulo');
            modalEditar.querySelector('#modal-autor').value = button.getAttribute('data-autor');
            modalEditar.querySelector('#modal-tag').value = button.getAttribute('data-tag');
            modalEditar.querySelector('#modal-tag2').value = button.getAttribute('data-tag2');
            modalEditar.querySelector('#modal-tag3').value = button.getAttribute('data-tag3');
            modalEditar.querySelector('#modal-data').value = button.getAttribute('data-data');
        });
    });
</script>