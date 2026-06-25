<?php
include("../conexao/conexao.php");

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

            <?php while ($dado = mysqli_fetch_array($resultado)) { ?>

                <tr>
                    <td><?= $dado["idProduto"] ?></td>
                    <td><?= $dado["nome"] ?></td>
                    <td><?= $dado["descricao"] ?></td>
                    <td><?= $dado["marca"] ?></td>
                    <td><?= $dado["quantidade"] ?></td>
                    <td>R$ <?= number_format($dado["preco"], 2, ',', '.') ?></td>

                    <td>
                        <a href="../Excluir/excluirProduto.php?idProduto=<?= $dado["idProduto"] ?>"
                           class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>
</div>