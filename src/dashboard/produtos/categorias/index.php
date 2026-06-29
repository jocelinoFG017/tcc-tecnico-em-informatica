<?php
session_start();
include_once("../../../login/verificaAdmin.php");
include_once("../../../conexao/conexao.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="../../styles.css" rel="stylesheet">
</head>

<body>

    <?php include_once("../../../includes/headerDash.php"); ?>
    <?php include_once("../../sidebar/sidebar.php"); ?>

    <div class="d-flex">

        <div id="content" class="content flex-grow-1">

            <!-- Cabeçalho -->
            <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">

                <div>
                    <h4 class="mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-tags text-primary"></i>
                        Cadastro de Categorias
                    </h4>

                    <small class="text-muted">
                        Visualize e cadastre novas categorias.
                    </small>
                </div>

            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs px-3 mt-3">

                <li class="nav-item">
                    <button class="nav-link active"
                        data-bs-toggle="tab"
                        data-bs-target="#listar">

                        Listar Categorias
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#add">

                        Adicionar Categoria
                    </button>
                </li>

            </ul>

            <!-- Conteúdo -->
            <div class="tab-content p-3">

                <!-- Listagem -->
                <div class="tab-pane fade show active" id="listar">

                    <div class="card">

                        <div class="card-body">

                            <h5 class="card-title">
                                Tabela de Categorias
                            </h5>

                            <?php include_once("tabela.php"); ?>

                        </div>

                    </div>

                </div>

                <!-- Cadastro -->
                <div class="tab-pane fade" id="add">

                    <div class="card">

                        <div class="card-body">

                            <h5 class="card-title">
                                Cadastro de Categoria
                            </h5>

                            <form action="cadastrar.php" method="POST">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Nome da Categoria
                                    </label>

                                    <input
                                        type="text"
                                        name="nome"
                                        class="form-control"
                                        placeholder="Digite o nome da categoria"
                                        required>

                                </div>
                                <div class="mb-3">

                                    <label class="form-label">
                                        Descrição da Categoria
                                    </label>

                                    <input
                                        type="text"
                                        name="descricao"
                                        class="form-control"
                                        placeholder="Digite a descrição da categoria"
                                        required>

                                </div>

                                <button
                                    type="submit"
                                    name="cadastrar"
                                    class="btn btn-primary">

                                    Cadastrar

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Modal Excluir -->
    <div class="modal fade" id="modalExcluir" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-sm">

            <div class="modal-content border-0 shadow-lg rounded-4">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        Confirmar exclusão
                    </h5>

                    <button class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body text-center">

                    Tem certeza que deseja excluir esta categoria?

                    <p class="text-danger small mt-2">
                        Esta ação não poderá ser desfeita.
                    </p>

                </div>

                <div class="modal-footer border-0 d-flex justify-content-between">

                    <button
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <a
                        id="btnExcluirConfirmado"
                        class="btn btn-danger">

                        Excluir

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow-lg rounded-4">

                <form method="POST" action="editar.php">

                    <div class="modal-header bg-primary text-white">

                        <h5 class="modal-title">

                            <i class="fa-solid fa-pen me-2"></i>

                            Editar Categoria

                        </h5>

                        <button
                            type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">

                        </button>

                    </div>

                    <div class="modal-body">

                        <input
                            type="hidden"
                            id="modal-idCategoria"
                            name="idCategoria">

                        <div class="mb-3">

                            <label class="form-label">

                                Nome da Categoria

                            </label>

                            <input
                                type="text"
                                id="modal-nome"
                                name="nome"
                                class="form-control"
                                required>

                        </div>
                        <div class="mb-3">

                            <label class="form-label">

                                Descrição da Categoria

                            </label>

                            <input
                                type="text"
                                id="modal-descricao"
                                name="descricao"
                                class="form-control"
                                required>

                        </div>
                    </div>

                    <div class="modal-footer border-0 d-flex justify-content-between">

                        <button
                            type="button"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">

                            Cancelar

                        </button>

                        <button
                            class="btn btn-primary">

                            Salvar

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/sidebar.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Excluir
            const modalExcluir = document.getElementById('modalExcluir');

            modalExcluir.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;

                document.getElementById('btnExcluirConfirmado')
                    .href = 'excluir.php?idCategoria=' + button.getAttribute('data-id');

            });

            // Editar
            const modalEditar = document.getElementById('modalEditar');

            modalEditar.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;

                modalEditar.querySelector('#modal-idCategoria').value = button.getAttribute('data-id');
                modalEditar.querySelector('#modal-nome').value = button.getAttribute('data-nome');
                modalEditar.querySelector('#modal-descricao').value = button.getAttribute('data-descricao');

            });

        });
    </script>

</body>

</html>