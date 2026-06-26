<?php
include("../../conexao/conexao.php");

$sql = "SELECT 
            u.idUsuario, 
            u.nome, 
            u.login, 
            u.fk_idNivelAcesso,
            n.cargo AS nomeCargo
        FROM usuario u
        LEFT JOIN nivelacesso n ON u.fk_idNivelAcesso = n.idNivelAcesso";
$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Nível de Acesso</th>
                <th style="width: 120px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?= htmlspecialchars($dado["nome"]) ?></td>
                    <td><?= htmlspecialchars($dado["login"]) ?></td>
                    <td><?= htmlspecialchars($dado["nomeCargo"]) ?></td>

                    <td>
                        <div class="d-flex gap-2">

                            <button class="btn btn-sm btn-primary btn-editar"
                                data-id="<?= $dado['idUsuario'] ?>"
                                data-nome="<?= htmlspecialchars($dado['nome'], ENT_QUOTES) ?>"
                                data-login="<?= htmlspecialchars($dado['login'], ENT_QUOTES) ?>"
                                data-nivel="<?= htmlspecialchars($dado['fk_idNivelAcesso'], ENT_QUOTES) ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditar">

                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-sm btn-danger btn-excluir"
                                data-bs-toggle="modal"
                                data-bs-target="#modalExcluir"
                                data-id="<?= $dado['idUsuario']; ?>">

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
        var modalEl = document.getElementById('modalExcluir');
        modalEl.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // botão que abriu o modal
            var id = button.getAttribute('data-id');
            var btnConfirm = document.getElementById('btnExcluirConfirmado');
            btnConfirm.setAttribute('href', 'excluir.php?idUsuario=' + id);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalEditar = document.getElementById('modalEditar');

        modalEditar.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            // Dados do botão
            var id = button.getAttribute('data-id');
            var nome = button.getAttribute('data-nome');
            var login = button.getAttribute('data-login');
            var nivel = button.getAttribute('data-nivel');

            // Preenche os campos do modal
            modalEditar.querySelector('#modal-idUsuario').value = id;
            modalEditar.querySelector('#modal-nome').value = nome;
            modalEditar.querySelector('#modal-login').value = login;
            modalEditar.querySelector('#modal-nivel').value = nivel;
            modalEditar.querySelector('#modal-senha').value = '';
        });
    });
</script>