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
                        <a href="../crud/editar/eUsuario.php?idUsuario=<?php echo $dado['idUsuario']; ?>" class="btn btn-sm btn-primary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Botão excluir (abre modal via JS) -->
                        <a href="#" class="btn-excluir" 
                           data-bs-toggle="modal" 
                           data-bs-target="#modalExcluir" 
                           data-id="<?php echo $dado['idUsuario']; ?>">
                           <i class="fas fa-trash-alt text-danger"></i>
                        </a>

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
