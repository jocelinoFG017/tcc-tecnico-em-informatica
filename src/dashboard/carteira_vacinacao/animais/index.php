<?php
include_once("../../../login/verificaAdmin.php");
include_once("../../../conexao/conexao.php");

// LISTA ANIMAIS
$sql = "SELECT 
            animal.idAnimal,
            animal.nome,
            animal.especie,
            animal.raca,
            animal.data_nascimento,
            usuario.nome AS dono
        FROM animal
        INNER JOIN usuario 
            ON animal.fk_idUsuario = usuario.idUsuario
        ORDER BY animal.idAnimal DESC";

$resultado = mysqli_query($conn, $sql);

// USUÁRIOS PARA CADASTRO
$usuarios = mysqli_query($conn, "SELECT idUsuario, nome FROM usuario ORDER BY nome ASC");
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animais</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- NÃO MEXE AQUI -->
    <link href="../../styles.css" rel="stylesheet">
</head>

<body>

    <?php include_once("../../../includes/headerDash.php"); ?>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <?php include_once("../../sidebar/sidebar.php"); ?>

        <!-- CONTEÚDO -->
        <div id="content" class="content flex-grow-1">

            <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center">

                <div>
                    <h4 class="mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-paw text-success"></i>
                        Animais
                    </h4>
                    <small class="text-muted">Gerencie os animais cadastrados.</small>
                </div>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
                    <i class="fas fa-plus"></i> Novo Animal
                </button>

            </div>

            <div class="p-3">

                <!-- TABELA PADRÃO (igual Marcas) -->
                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th>Raça</th>
                                <th>Nascimento</th>
                                <th>Dono</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $contador = 1;
                            while ($dado = mysqli_fetch_array($resultado)) { ?>

                                <tr>
                                    <td><?= $contador++ ?></td>

                                    <td><?= htmlspecialchars($dado["nome"]) ?></td>
                                    <td><?= htmlspecialchars($dado["especie"]) ?></td>
                                    <td><?= htmlspecialchars($dado["raca"]) ?></td>

                                    <td>
                                        <?= $dado["data_nascimento"]
                                            ? date('d/m/Y', strtotime($dado["data_nascimento"]))
                                            : '-' ?>
                                    </td>

                                    <td><?= htmlspecialchars($dado["dono"]) ?></td>

                                    <td>
                                        <div class="d-flex gap-2">

                                            <button class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditar"
                                                data-id="<?= $dado['idAnimal'] ?>"
                                                data-nome="<?= htmlspecialchars($dado['nome'], ENT_QUOTES) ?>"
                                                data-especie="<?= htmlspecialchars($dado['especie'], ENT_QUOTES) ?>"
                                                data-raca="<?= htmlspecialchars($dado['raca'], ENT_QUOTES) ?>"
                                                data-data="<?= $dado['data_nascimento'] ?>">

                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button class="btn btn-sm btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalExcluir"
                                                data-id="<?= $dado['idAnimal'] ?>">

                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- 👇 NOVO BOTÃO CARTEIRA -->
                                            <a href="../carteira/index.php?animal=<?= $dado['idAnimal'] ?>"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-syringe"></i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

    <!-- MODAL CADASTRAR -->
    <div class="modal fade" id="modalCadastrar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="cadastrar.php" method="POST">

                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Animal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input name="nome" class="form-control mb-2" placeholder="Nome" required>
                        <input name="especie" class="form-control mb-2" placeholder="Espécie">
                        <input name="raca" class="form-control mb-2" placeholder="Raça">
                        <input type="date" name="data_nascimento" class="form-control mb-2">

                        <select name="usuario" class="form-select" required>
                            <option value="">Selecione o dono</option>
                            <?php while ($u = mysqli_fetch_assoc($usuarios)) { ?>
                                <option value="<?= $u['idUsuario']; ?>">
                                    <?= htmlspecialchars($u['nome']); ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" name="cadastrar">Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- MODAL EXCLUIR -->
    <div class="modal fade" id="modalExcluir" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Excluir Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Tem certeza que deseja excluir este animal?
                </div>

                <div class="modal-footer">
                    <a id="btnExcluirConfirmado" href="#" class="btn btn-danger">Excluir</a>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('modalExcluir');

            modal.addEventListener('show.bs.modal', function(event) {
                const id = event.relatedTarget.getAttribute('data-id');

                document.getElementById('btnExcluirConfirmado')
                    .setAttribute('href', 'excluir.php?id=' + id);
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/sidebar.js"></script>

</body>

</html>