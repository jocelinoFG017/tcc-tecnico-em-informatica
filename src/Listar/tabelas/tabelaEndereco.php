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
<table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Cidade</th>
         <th scope="col">Bairro</th>
         <th scope="col">Rua</th>
         <th scope="col">Numero</th>
         <th scope="col">Telefone</th>
         <th scope="col">Estado</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_array($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idEndereco"] ;?></td>
         <td><?php echo $dado["cidade"] ;?></td>
         <td><?php echo $dado["bairro"] ;?></td>
         <td><?php echo $dado["rua"] ;?></td>
         <td><?php echo $dado["numero"] ;?></td>
         <td><?php echo $dado["telefone"] ;?></td>
         <td><?php echo $dado["estado"] ;?></td>
   </tbody>
   <?php
      }
      ?>
</table>
</div>