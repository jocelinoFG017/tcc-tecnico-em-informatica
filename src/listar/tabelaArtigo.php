<?php
include("../conexao/conexao.php");

$sql = "SELECT * FROM artigo";
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
                        <?= trim($dado["tag"] . " " . $dado["tag2"] . " " . $dado["tag3"]); ?>
                    </td>
                    <td>
                        <?= date('d/m/Y', strtotime($dado["data_publicacao"])); ?>
                    </td>

                    <td>
                        <a href="../Excluir/excluirArtigo.php?idArtigo=<?= $dado["idArtigo"]; ?>"
                           class="btn btn-sm btn-danger"
                           title="Excluir">

                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>