<?php
session_start();
include("../../login/verificaAdmin.php");
include("../../conexao/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Endereços</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <?php include("../../includes/headerDash.php"); ?>

    <!-- SIDEBAR -->
    <?php include("../sidebar/sidebar.php"); ?>

    <div class="d-flex">

        <!-- CONTEÚDO -->
        <div id="content" class="content flex-grow-1">

            <!-- HEADER DA PÁGINA -->
            <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">

                <div>
                    <h4 class="mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-location-dot text-primary"></i>
                        Formulário de cadastro de endereços
                    </h4>
                    <small class="text-muted">Visualize e cadastre novos endereços aqui.</small>
                </div>

                <a href="../../pdfs/enderecopdf.php" target="_blank" class="btn btn-info">
                    <i class="fas fa-file-pdf me-1"></i> PDF
                </a>

            </div>

            <!-- TABS -->
            <ul class="nav nav-tabs px-3 mt-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#listar">
                        Listar Endereços
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add">
                        Adicionar Endereço
                    </button>
                </li>
            </ul>

            <!-- CONTENT -->
            <div class="tab-content p-3">

                <!-- LISTAR -->
                <div class="tab-pane fade show active" id="listar">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabela de Endereços</h5>

                            <?php include("tabela.php"); ?>
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="tab-pane fade" id="add">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Cadastro de Endereço</h5>

                            <?php if (isset($_SESSION['statusCadastro'])): ?>
                                <div class="alert alert-success">Cadastro efetuado</div>
                            <?php unset($_SESSION['statusCadastro']);
                            endif; ?>

                            <?php if (isset($_SESSION['usuarioExiste'])): ?>
                                <div class="alert alert-danger">Erro: já existe</div>
                            <?php unset($_SESSION['usuarioExiste']);
                            endif; ?>

                            <!-- FORM -->
                            <form action="cadastrar.php" method="POST">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bairro</label>
                                        <input name="bairro" class="form-control" required
                                            placeholder="Insira o bairo">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Rua</label>
                                        <input name="rua" class="form-control" required
                                            placeholder="Insira  a rua">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Número</label>
                                        <input name="numero" class="form-control" placeholder="Insira o número">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Telefone</label>
                                        <input name="telefone" class="form-control" placeholder="Insira o telefone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Estado</label>
                                        <select name="estadoId" id="estadoSelect" class="form-select">
                                            <option value="">Selecione o Estado</option>

                                            <?php
                                            $resultEstado = "SELECT * FROM estado ORDER BY nome";
                                            $resultadoEstado = mysqli_query($conn, $resultEstado);

                                            while ($rowEstado = mysqli_fetch_assoc($resultadoEstado)) {
                                                echo "<option value='{$rowEstado['idEstado']}'>{$rowEstado['nome']}</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cidade</label>
                                        <select name="cidadeId" id="cidadeSelect" class="form-select">
                                            <option value="">Selecione a cidade</option>
                                        </select>
                                    </div>

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

    <!-- MODAL EXCLUIR -->
    <div class="modal fade" id="modalExcluir" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        Confirmar exclusão
                    </h5>

                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p>Tem certeza que deseja excluir este endereço?</p>
                    <p class="text-danger small">Esta ação não poderá ser desfeita.</p>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <a id="btnExcluirConfirmado"
                        class="btn btn-danger">
                        Excluir
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL EDITAR -->
    <div class="modal fade" id="modalEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <form method="POST" action="editar.php">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            Editar Endereço
                        </h5>

                        <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden"
                            name="idEndereco"
                            id="modal-idEndereco">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Bairro</label>
                                <input id="modal-bairro"
                                    name="bairro"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Rua</label>
                                <input id="modal-rua"
                                    name="rua"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Número</label>
                                <input id="modal-numero"
                                    name="numero"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Telefone</label>
                                <input id="modal-telefone"
                                    name="telefone"
                                    class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Cidade</label>

                                <select id="modal-cidade"
                                    name="cidadeId"
                                    class="form-select"
                                    required>

                                    <?php
                                    $sqlCidade = "SELECT idCidade, nome FROM cidade ORDER BY nome";
                                    $resCidade = mysqli_query($conn, $sqlCidade);

                                    while ($cidade = mysqli_fetch_assoc($resCidade)) {
                                        echo "<option value='{$cidade['idCidade']}'>{$cidade['nome']}</option>";
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer border-0 d-flex justify-content-between">

                        <button type="button"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
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

    <!-- JS cidade -->
    <script>
        document.getElementById('estadoSelect').addEventListener('change', function() {

            const estadoId = this.value;
            const cidadeSelect = document.getElementById('cidadeSelect');

            cidadeSelect.innerHTML = '<option>Carregando...</option>';

            if (estadoId) {

                fetch('../../buscar/buscarCidades.php?estadoId=' + estadoId)
                    .then(res => res.text())
                    .then(data => {
                        cidadeSelect.innerHTML = data;
                    });

            } else {
                cidadeSelect.innerHTML = '<option>Selecione a cidade</option>';
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebar.js"></script>

</body>

</html>