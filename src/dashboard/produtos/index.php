<?php
session_start();
include_once("../../login/verificaAdmin.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <?php include_once("../../includes/headerDash.php"); ?>
    <!-- SIDEBAR -->
    <?php include_once("../sidebar/sidebar.php"); ?>

    <div class="d-flex">

        <!-- CONTEÚDO -->
        <div id="content" class="content flex-grow-1">

            <!-- HEADER DA PÁGINA -->
            <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-box text-primary"></i>
                        Formulário de cadastro de produtos
                    </h4>
                    <small class="text-muted">Visualize e cadastre novos produtos aqui.</small>
                </div>

                <a href="../../pdfs/produtopdf.php" target="_blank" class="btn btn-info">
                    <i class="fas fa-file-pdf me-1"></i> PDF
                </a>
            </div>

            <!-- TABS -->
            <ul class="nav nav-tabs px-3 mt-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#listar">
                        Listar Produtos
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add">
                        Adicionar Produto
                    </button>
                </li>
            </ul>

            <!-- CONTEÚDO TABS -->
            <div class="tab-content p-3">

                <!-- LISTAR -->
                <div class="tab-pane fade show active" id="listar">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabela de Produtos</h5>

                            <?php include_once("tabela.php"); ?>
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="tab-pane fade" id="add">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Cadastro de Produtos</h5>

                            <?php if (isset($_SESSION['statusCadastro'])): ?>
                                <div class="alert alert-success">Cadastro efetuado</div>
                            <?php unset($_SESSION['statusCadastro']);
                            endif; ?>

                            <?php if (isset($_SESSION['usuarioExiste'])): ?>
                                <div class="alert alert-danger">Erro: já existe</div>
                            <?php unset($_SESSION['usuarioExiste']);
                            endif; ?>

                            <form action="cadastrar.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nome</label>
                                        <input name="nome" class="form-control" placeholder="Insira o nome do produto" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Marca</label>

                                        <select name="marca" class="form-select" required>

                                            <option value="">Selecione uma marca</option>

                                            <?php
                                            $sqlMarca = "SELECT idMarca, nome FROM marca ORDER BY nome";
                                            $resultadoMarca = mysqli_query($conn, $sqlMarca);

                                            while ($marca = mysqli_fetch_assoc($resultadoMarca)) {
                                            ?>
                                                <option value="<?= $marca['idMarca']; ?>">
                                                    <?= htmlspecialchars($marca['nome']); ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Descrição</label>
                                    <input name="descricao" class="form-control"
                                        placeholder="Insira a descrição do produto" required>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Quantidade</label>
                                        <input name="quantidade" id="quantidade" type="text" class="form-control" placeholder="Insira a quantidade" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Preço</label>
                                        <input name="preco" type="number" step="0.01" class="form-control" placeholder="Insira o preço" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Imagem</label>
                                    <input type="file" name="foto" class="form-control">
                                    <small class="text-muted">Envie a imagem do produto</small>
                                </div>

                                <button type="submit" name="cadastrar" class="btn btn-primary">
                                    Cadastrar
                                </button>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Modal de Exclusão -->
    <div class="modal fade" id="modalExcluir" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        Confirmar exclusão
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p>Tem certeza que deseja excluir este produto?</p>
                    <p class="text-danger small">Esta ação não poderá ser desfeita.</p>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <a id="btnExcluirConfirmado" class="btn btn-danger">
                        Excluir
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal de Edição -->
    <div class="modal fade" id="modalEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <form method="POST" action="editar.php">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-pen me-2"></i>
                            Editar Produto
                        </h5>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="idProduto" id="modal-idProduto">

                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label">Nome</label>
                                <input id="modal-nome" name="nome" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Descrição</label>
                                <input id="modal-descricao" name="descricao" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Marca</label>

                                <select id="modal-marca" name="marca" class="form-select" required>

                                    <?php
                                    $sqlMarca = "SELECT idMarca, nome FROM marca ORDER BY nome";
                                    $resultadoMarca = mysqli_query($conn, $sqlMarca);

                                    while ($marca = mysqli_fetch_assoc($resultadoMarca)) {
                                    ?>
                                        <option value="<?= $marca['idMarca']; ?>">
                                            <?= htmlspecialchars($marca['nome']); ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Quantidade</label>
                                <input id="modal-quantidade" name="quantidade" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Preço</label>
                                <input id="modal-preco" name="preco" class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer border-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button class="btn btn-primary">
                            Salvar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/sidebar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // EXCLUIR
            const modalExcluir = document.getElementById('modalExcluir');

            modalExcluir.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');

                document.getElementById('btnExcluirConfirmado')
                    .setAttribute('href', 'excluir.php?idProduto=' + id);
            });

            // EDITAR
            const modalEditar = document.getElementById('modalEditar');

            modalEditar.addEventListener('show.bs.modal', function(event) {
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

    <script>
        document.getElementById('quantidade').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>