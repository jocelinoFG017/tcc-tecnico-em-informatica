<?php
include("../conexao/conexao.php");
$sql = "SELECT * FROM artigo";
$resultado = mysqli_query($conn,$sql);
?>
<div class="table-responsive">
<table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Titulo</th>
         <th scope="col">Autor</th>
         <th scope="col">Tags</th>
         <th scope="col">Data de Publicação</th>
         <th scope="col">Ações</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_array($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idArtigo"] ;?></td>
         <td><?php echo $dado["titulo"] ;?></td>
         <td><?php echo $dado["autor"] ;?></td>
         <td><?php echo $dado["tag"] . " " . $dado["tag2"] . " " . $dado["tag3"]  ;?></td>
         <td><?php echo date('d/m/Y',strtotime($dado["data_publicacao"]));?></td>
         <td>
            <?php echo "<a href='../Excluir/excluirArtigo.php?idArtigo=" . $dado["idArtigo"] . "'> "?>
            <i class="fas fa-trash-alt"></i> <?php echo "</a>";?>   
         </td>
         
   </tbody>
   <?php
      }
      ?>
</table>
</div>

