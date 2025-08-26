<?php
include("../conexao/conexao.php");

// consulta varias linhas
// $sql = "SELECT en.idEndereco,c.nome as cidade, en.bairro, en.rua, en.numero, est.nome as estado, en.telefone as telefone, pa.idPais, pa.nome as pais
$sql = "SELECT en.idEndereco,c.nome as cidade, en.bairro, en.rua, en.numero, en.telefone as telefone, est.nome as estado
		FROM endereco AS en
		JOIN cidade AS c ON en.cidadeId = c.idCidade
		JOIN estado AS est ON en.estadoId = est.idEstado
      --  JOIN pais AS pa ON en.idPais = pa.idPais
      ORDER BY idEndereco;";
$resultado = mysqli_query($conn,$sql);

//$con = $mysqli->query($consulta) or die($mysqli->error);
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
         <th scope="col">Estado</th>
        <!-- <th scope="col">País</th>-->
         <th scope="col">Telefone</th>
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
         <!-- <td><?php //echo $dado["cep"] ;?></td>-->
         <td><?php echo $dado["estado"] ;?></td>
       <!--  <td><?php //echo $dado["pais"] ;?></td>--> 
         <td><?php echo $dado["telefone"] ;?></td>
   </tbody>
   <?php
      }
      ?>
</table>
</div>
<!--Fim tabela de enderecos-->