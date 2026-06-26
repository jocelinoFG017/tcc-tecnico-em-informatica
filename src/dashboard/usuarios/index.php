<?php
session_start();
include("../../login/verificaLogin.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">

</head>

<body>

    <?php include("../../templates/headerDash.php"); ?>

    <!-- SIDEBAR -->
    <?php include("../sidebar/sidebar.php"); ?>

    <!-- CONTEÚDO -->
    <div id="content" class="content">
        <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-file-lines text-primary"></i>
                    Formulário de cadastro de usuários
                </h4>
                <small class="text-muted">Visualize e cadastre novos usuários aqui.</small>
            </div>

            <a href="../../pdfs/usuariopdf.php" target="_blank" class="btn btn-info">
                <i class="fas fa-file-pdf me-1"></i> PDF
            </a>
        </div>

        <ul class="nav nav-tabs px-3 mt-3" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-listar">
                    Listar Usuários
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-adicionar">
                    Adicionar Usuário
                </button>
            </li>
        </ul>

        <div class="tab-content p-3">

            <div class="tab-pane fade show active" id="tab-listar">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tabela de Usuários</h5>
                        <?php include("tabela.php"); ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-adicionar">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Formulário de Cadastro</h5>

                        <?php if (isset($_SESSION['statusCadastro'])): ?>
                            <div class="alert alert-success">Cadastro efetuado</div>
                        <?php unset($_SESSION['statusCadastro']);
                        endif; ?>

                        <?php if (isset($_SESSION['usuarioExiste'])): ?>
                            <div class="alert alert-danger">ERRO: login já existe</div>
                        <?php unset($_SESSION['usuarioExiste']);
                        endif; ?>

                        <form action="cadastrar.php" method="POST">

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" required class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="login" required class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" name="senha" required class="form-control">
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary">Cadastrar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- MODAIS -->
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
                    <p>Tem certeza que deseja excluir este usuário?</p>
                    <p class="text-danger small">Esta ação não poderá ser desfeita.</p>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="btnExcluirConfirmado" class="btn btn-danger">Excluir</a>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">

                <form method="POST" action="editar.php">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-user-pen me-2"></i>
                            Editar Usuário
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="idUsuario" id="modal-idUsuario">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <input id="modal-nome" name="nome" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <input id="modal-login" name="login" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <input id="modal-senha" name="senha" class="form-control" placeholder="Senha aqui">
                            </div>

                            <div class="col-md-6">
                                <select id="modal-nivel" name="fk_idNivelAcesso" class="form-select" required>
                                    <?php
                                    $sqlNivel = "SELECT * FROM nivelacesso";
                                    $resNivel = mysqli_query($conn, $sqlNivel);
                                    while ($nivel = mysqli_fetch_assoc($resNivel)) {
                                        echo "<option value='{$nivel['idNivelAcesso']}'>{$nivel['cargo']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer border-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/sidebar.js"></script>
</body>

</html>