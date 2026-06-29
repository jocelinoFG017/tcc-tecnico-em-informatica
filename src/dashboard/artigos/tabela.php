<?php
include_once "../../conexao/conexao.php";

$sql = "
SELECT
    a.idArtigo,
    a.titulo,
    a.texto,
    a.imagem,
    a.data_publicacao,
    u.idUsuario,
    u.nome AS autor,
    GROUP_CONCAT(t.nome ORDER BY t.nome SEPARATOR ', ') AS tags

FROM artigo a

INNER JOIN usuario u
    ON a.fk_idUsuario = u.idUsuario

LEFT JOIN artigo_tag at
    ON at.fk_idArtigo = a.idArtigo

LEFT JOIN tag t
    ON t.idTag = at.fk_idTag

GROUP BY
    a.idArtigo,
    a.titulo,
    a.texto,
    a.imagem,
    a.data_publicacao,
    u.idUsuario,
    u.nome

ORDER BY a.data_publicacao DESC
";

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

        <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>

            <tr>

                <td><?= $dado["idArtigo"]; ?></td>

                <td><?= htmlspecialchars($dado["titulo"]); ?></td>

                <td><?= htmlspecialchars($dado["autor"]); ?></td>

                <td>
                    <?= $dado["tags"] ? htmlspecialchars($dado["tags"]) : "-" ?>
                </td>

                <td>
                    <?= !empty($dado["data_publicacao"])
                        ? date('d/m/Y', strtotime($dado["data_publicacao"]))
                        : "-"; ?>
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <button
                            class="btn btn-sm btn-primary btn-editar"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEditar"

                            data-id="<?= $dado['idArtigo']; ?>"
                            data-titulo="<?= htmlspecialchars($dado['titulo'], ENT_QUOTES); ?>"
                            data-texto="<?= htmlspecialchars($dado['texto'], ENT_QUOTES); ?>"
                            data-autor="<?= $dado['idUsuario']; ?>"
                            data-data="<?= $dado['data_publicacao']; ?>"
                            data-imagem="<?= htmlspecialchars($dado['imagem'], ENT_QUOTES); ?>">

                            <i class="fas fa-edit"></i>

                        </button>

                        <button
                            class="btn btn-sm btn-danger btn-excluir"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluir"
                            data-id="<?= $dado['idArtigo']; ?>">

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

        document
            .getElementById('btnExcluirConfirmado')
            .href = 'excluir.php?idArtigo=' + button.dataset.id;

    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        document.getElementById('modal-idArtigo').value = button.dataset.id;
        document.getElementById('modal-titulo').value = button.dataset.titulo;
        document.getElementById('modal-texto').value = button.dataset.texto;
        document.getElementById('modal-autor').value = button.dataset.autor;
        document.getElementById('modal-data').value = button.dataset.data;

        // A seleção das tags será carregada posteriormente.
        // As tags não podem mais ser preenchidas por data-tag, data-tag2 e data-tag3,
        // pois agora elas ficam na tabela artigo_tag.

    });

});
</script>
