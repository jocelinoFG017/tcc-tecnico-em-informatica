<?php
include("../../conexao/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['idUsuario']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $nivel = intval($_POST['fk_idNivelAcesso']);
    $senha = $_POST['senha'];

    // Se senha preenchida, atualiza, senão mantém a antiga
    if (!empty($senha)) {
        $senhaHash = md5($senha); // ou password_hash() para maior segurança
        $sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senhaHash', fk_idNivelAcesso=$nivel WHERE idUsuario=$id";
    } else {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', fk_idNivelAcesso=$nivel WHERE idUsuario=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../Dashboard/usuarios.php?msg=editado");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}
?>
