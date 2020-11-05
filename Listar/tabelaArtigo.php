<?php
include("../conexao/conexao.php");
// consulta varias linhas
$sql = "SELECT * FROM artigo";
$resultado = mysqli_query($conn,$sql);

//$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<div class="table-responsive">
<table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Titulo</th>
         <th scope="col">Autor</th>
         <th scope="col">Data</th>
         <th scope="col">Tag</th>
         <th scope="col">Ação</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_array($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idArtigo"] ;?></td>
         <td><?php echo $dado["titulo"] ;?></td>
         <td><?php echo $dado["autor"] ;?></td>
         <td><?php echo $dado["data_publicacao"] ;?></td>
         <td><?php echo $dado["tag"] ;?></td>
         
   </tbody>
   <?php
      }
      ?>
</table>
</div>
<!--Fim tabela de artigos-->

