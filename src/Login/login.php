<?php
session_start();
include("../conexao/conexao.php");

if(empty($_POST['login']) || empty($_POST['senha'])){
    header('Location: ../Login/loginIndex.php');
    exit();
}

$login = mysqli_real_escape_string($conn, $_POST['login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

// Seleciona usuário pelo login e senha
$query = "SELECT idUsuario, nome, fk_idNivelAcesso FROM usuario WHERE login = '{$login}' AND senha = md5('{$senha}')";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario = mysqli_fetch_assoc($result);

    // Pega o nome do nível de acesso
    $idNivel = $usuario['fk_idNivelAcesso'];
    $sqlNivel = "SELECT cargo as nomeCargo FROM nivelacesso WHERE idNivelAcesso = $idNivel LIMIT 1";
    $resultNivel = mysqli_query($conn, $sqlNivel);
    $nivel = mysqli_fetch_assoc($resultNivel);

    // Armazena na sessão
    $_SESSION['login'] = $login;
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['fk_idNivelAcesso'] = $idNivel;
    $_SESSION['nomeNivelAcesso'] = $nivel['nomeCargo']; // aqui está o nome do acesso

    header('Location: ../Dashboard/painel.php');
    exit();
} else {
    $_SESSION['naoAutenticado'] = true;
    header('Location: ../Login/loginIndex.php');
    exit();
}
?>
