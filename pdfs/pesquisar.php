<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pesquisar</title>
</head>
<body> 
<table width="1430" height="529" border="0" align="center">
  <tr>
    <td width="1" rowspan="4">
    <td colspan="9" align="center"><p>&nbsp;</p>
  <p><img src="img/bat.png" width="334" height="150" alt="Batman" longdesc="img/nci.png" /></p>    
  </tr>
  <tr>
    <td colspan="9"><p>&nbsp;</p>
      <table width="1055" border="1" align="center">
        <tr>
          <td width="94" align="center"><a href="index.php">Home</a></td>
          <!--<td width="200" align="center"><a href="importa.php">Carregar Tabela Debitos</a></td>
          <td width="202" align="center"><a href="excluir.php">ExcluirTabela Debitos</a></td>
          <td width="200" align="center"><a href="importaalunos.php">Carregar Tabela Alunos</a></td>
          <td width="200" align="center"><a href="excluiralunos.php">Excluir Tabela Alunos</a></td>-->
          <td width="156" align="center"><a href="pesquisar.php">Pesquisar Entrada</a></td>
        </tr>
      </table>
      <p><br>
        <center>
      </p>
      <table width="800" height="500" border="0" align="center">
  <tr>

<form id="form1" name="form1" method="post" action="exibepdf.php">
<?php  
echo"Selecione a Matricula do Usuario<br>";
$host="localhost";
$user="root";
$pass="";
$banco="fingerprint";



$conexao=mysqli_connect($host,$user,$pass,$banco);
//mysql_select_db($banco);
$sql= "SELECT * FROM cadastro_geral";
$resultado = mysqli_query($conexao, $sql);


// imprime na tela o listbox

echo "<select name='matricula' nome='matricula'>";

// faz o loop pelos dados, e joga em um array
while($linha = @mysqli_fetch_array($resultado)){
         // atribui o array a uma variavel($mostra)
         $mostra = $linha['matricula'];
         // imprime na tela as op��es resgatadas do banco de dados
         echo "<option value=$mostra>$mostra</option>";
}
echo "</select>";
// fecha a conexao

?>

 <label>
          <br />
          <center><input type="submit" name="Pesquisar" id="Pesquisar" value="Pesquisar"/></center>
        </label>
      </form>

	</td>
</tr>
      
      </table>
</body>
</html>
    