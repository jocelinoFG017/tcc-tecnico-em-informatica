<?php
include("../conexao/conexao.php");
// consulta varias linhas
$sql = "SELECT * from usuario";

$resultado = mysqli_query($conn,$sql);

//$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<div class="table-responsive">
<table class="mb-0 table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">idUsuario</th>
         <th scope="col">Nome</th>
         <th scope="col">Login</th>
         <th scope="col">Ações</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_assoc($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idUsuario"] ;?></td>
         <td><?php echo $dado["nome"] ;?></td>
         <td><?php echo $dado["login"] ;?></td>
         <td>
            <?php echo "<a href='../Excluir/excluirUsuario.php?idUsuario=" . $dado["idUsuario"] . "'> "?>
            <i class="fas fa-edit"></i> <?php echo "</a>";?>
            
            <?php echo "<a href='../Excluir/excluirUsuario.php?idUsuario=" . $dado["idUsuario"] . "'> "?>
            <i class="fas fa-trash-alt"></i> <?php echo "</a>";?>   
         </td>
   </tbody>
   <?php
      }
      ?>
</table>
</div>
<!--Fim tabela de usuario-->


