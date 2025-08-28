<?php
include("../conexao/conexao.php");

$sql = " SELECT c.idCidade, c.nome AS cidade, c.fk_idEstado, est.idEstado, est.nome AS estado
         FROM cidade AS c 
         JOIN estado AS est ON c.fk_idEstado = est.idEstado 
         ORDER BY c.idCidade ";
$resultado = mysqli_query($conn,$sql);

?>
<div class="table-responsive">
<table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Cidade</th>
         <th scope="col">Estado</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_array($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idCidade"] ;?></td>
         <td><?php echo $dado["cidade"] ;?></td>
         <td><?php echo $dado["estado"] ;?></td>

   </tbody>
   <?php
      }
      ?>
</table>
</div>