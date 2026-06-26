<?php
include("../conexao/conexao.php");
require_once '../vendor/autoload.php'; // se estiver usando composer para Google Client

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Configurações do Google Client
$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID'));
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
$client->setRedirectUri('http://localhost:8080/Login/googleCallback.php');
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    // Redireciona para login Google
    header('Location: '.$client->createAuthUrl());
    exit();
} else {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(isset($token['error'])){
        die('Erro ao autenticar com Google: ' . $token['error']);
    }

    $client->setAccessToken($token['access_token']);
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email = mysqli_real_escape_string($conn, $google_account_info->email);
    $nome = mysqli_real_escape_string($conn, $google_account_info->name);

    // Verifica se usuário já existe
    $res = mysqli_query($conn, "SELECT * FROM usuario WHERE login = '$email'");
    
    if(mysqli_num_rows($res) == 0){
        // Cria usuário novo como comprador
        $senha = md5(bin2hex(random_bytes(8))); // senha aleatória
        mysqli_query($conn, "INSERT INTO usuario (nome, login, senha, fk_idNivelAcesso) 
                             VALUES ('$nome','$email','$senha',2)");
        $idUsuario = mysqli_insert_id($conn);
        $fkNivel = 2; // usuário comum
    } else {
        $usuario = mysqli_fetch_assoc($res);
        $idUsuario = $usuario['idUsuario'];
        $fkNivel = $usuario['fk_idNivelAcesso'];
    }

    // Seta sessão
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['login'] = $email;
    $_SESSION['nome'] = $nome;
    $_SESSION['fk_idNivelAcesso'] = $fkNivel;
    $_SESSION['nomeNivelAcesso'] = ($fkNivel == 1) ? 'Administrador' : 'Usuario';

    // Redireciona conforme nível
    if($fkNivel == 1){
        header('Location: ../dashboard/painel.php');
    } else {
        header('Location: ../loja/minhaConta.php');
    }
    exit();
}
?>
