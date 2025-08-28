<?php
include("../conexao/conexao.php");

$sql = "SELECT u.idUsuario, u.nome, u.login, n.cargo AS nomeCargo
        FROM usuario u
        LEFT JOIN nivelacesso n ON u.fk_idNivelAcesso = n.idNivelAcesso";
        
$resultado = mysqli_query($conn, $sql);
?>

<div class="table-responsive">
    <table class="mb-0 table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Nível de Acesso</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $dado["nome"]; ?></td>
                    <td><?php echo $dado["login"]; ?></td>
                    <td><?php echo $dado["nomeCargo"]; ?></td>
                    <td class="d-flex gap-2">
                        <!-- Botão editar -->
                        <button class="btn btn-sm btn-primary btn-editar" 
                                data-id="<?= $dado['idUsuario'] ?>" 
                                data-nome="<?= htmlspecialchars($dado['nome'], ENT_QUOTES) ?>" 
                                data-login="<?= htmlspecialchars($dado['login'], ENT_QUOTES) ?>" 
                                data-nivel="<?= $dado['nomeCargo'] ?>" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditar">
                            <i class="fas fa-edit"></i> 
                        </button>

                        <!-- Botão excluir -->
                        <button class="btn btn-sm btn-danger btn-excluir" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalExcluir" 
                                data-id="<?= $dado['idUsuario']; ?>">
                            <i class="fas fa-trash-alt"></i> 
                        </button>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var modalEl = document.getElementById('modalExcluir');
    modalEl.addEventListener('show.bs.modal', function(event){
        var button = event.relatedTarget; // botão que abriu o modal
        var id = button.getAttribute('data-id');
        var btnConfirm = document.getElementById('btnExcluirConfirmado');
        btnConfirm.setAttribute('href', '../Excluir/excluirUsuario.php?idUsuario=' + id);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {
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

