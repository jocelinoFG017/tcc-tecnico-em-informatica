<?php
include("../conexao/conexao.php");

$sql = "SELECT en.idEndereco, en.bairro, en.rua, en.numero, en.telefone, en.fk_idCidade, c.nome as cidade, est.nome as estado
        FROM endereco AS en
        JOIN cidade AS c ON en.fk_idCidade = c.idCidade
        JOIN estado AS est ON c.fk_idEstado = est.idEstado
        ORDER BY idEndereco;";
$resultado = mysqli_query($conn,$sql);
?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cidade</th>
                <th scope="col">Bairro</th>
                <th scope="col">Rua</th>
                <th scope="col">Número</th>
                <th scope="col">Telefone</th>
                <th scope="col">Estado</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dado = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?= $dado["idEndereco"]; ?></td>
                    <td><?= $dado["cidade"]; ?></td>
                    <td><?= $dado["bairro"]; ?></td>
                    <td><?= $dado["rua"]; ?></td>
                    <td><?= $dado["numero"]; ?></td>
                    <td><?= $dado["telefone"]; ?></td>
                    <td><?= $dado["estado"]; ?></td>
                    <td class="d-flex gap-2">
                        <!-- Botão excluir -->
                        <button class="btn btn-sm btn-danger btn-excluir" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalExcluir" 
                                data-id="<?= $dado['idEndereco']; ?>">
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
        // Agora usa idEndereco corretamente
        btnConfirm.setAttribute('href', '../Excluir/excluirEndereco.php?idEndereco=' + id);
    });
});
</script>
