<?php
include("../conexao/conexao.php");
// consulta varias linhas
$sql = "SELECT * FROM produto";
$resultado = mysqli_query($conn,$sql);

//$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<div class="table-responsive">
<table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">#</th>
         <th scope="col">Nome</th>
         <th scope="col">Descrição</th>
         <th scope="col">Marca</th>
         <th scope="col">Quantidade</th>
         <th scope="col">Preço</th>
         <th scope="col">Ação</th>
      </tr>
   </thead>
   <?php 
      while($dado = mysqli_fetch_array($resultado)){ ?>
   <tbody>
      <tr>
         <td><?php echo $dado["idProduto"] ;?></td>
         <td><?php echo $dado["nome"] ;?></td>
         <td><?php echo $dado["descricao"] ;?></td>
         <td><?php echo $dado["marca"] ;?></td>
         <td><?php echo $dado["quantidade"] ;?></td>
         <td><p>R$ <?php echo $dado["preco"] ;?></td></p>
         <td>
            <?php echo "<a href='../Excluir/excluirProduto.php?idProduto=" . $dado["idProduto"] . "'> "?>
            <i class="fas fa-trash-alt"></i> <?php echo "</a>";?>   
         </td>
          
   </tbody>
   <?php
      }
      ?>
</table>
</div>
<!--Fim tabela de enderecos-->

