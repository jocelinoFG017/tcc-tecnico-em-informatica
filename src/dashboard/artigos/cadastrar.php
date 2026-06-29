<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once("../../conexao/conexao.php");

if (isset($_POST['cadastrar'])) {

    $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
    $texto = mysqli_real_escape_string($conn, trim($_POST['texto']));
    $autor = (int)$_POST['autor'];
    $data_publicacao = $_POST['data_publicacao'];

    $tags = $_POST['tags'] ?? [];

    // Limita a 3 tags
    if (count($tags) > 3) {
        die("Selecione no máximo 3 tags.");
    }

    $foto = $_FILES["imagem"];
    $nome_imagem = "";

    // Se foi enviada uma imagem
    if (!empty($foto["name"])) {

        $largura = 500;
        $altura = 500;
        $tamanho = 100000;

        $error = array();

        // Verifica se é imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|webp)$/", $foto["type"])) {
            $error[] = "Isso não é uma imagem.";
        }

        $dimensoes = getimagesize($foto["tmp_name"]);

        if ($dimensoes[0] > $largura) {
            $error[] = "A largura da imagem não deve ultrapassar {$largura}px.";
        }

        if ($dimensoes[1] > $altura) {
            $error[] = "A altura da imagem não deve ultrapassar {$altura}px.";
        }

        if ($foto["size"] > $tamanho) {
            $error[] = "A imagem deve ter no máximo {$tamanho} bytes.";
        }

        if (empty($error)) {

            preg_match("/\.(gif|bmp|png|jpg|jpeg|webp)$/i", $foto["name"], $ext);

            $nome_imagem = md5(uniqid(time())) . "." . strtolower($ext[1]);

            $caminho_imagem = "../../uploads/artigos/" . $nome_imagem;

            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        } else {

            foreach ($error as $erro) {
                echo $erro . "<br>";
            }

            exit;
        }
    }

    // Cadastra o artigo
    $sql = mysqli_query($conn, "
        INSERT INTO artigo
        (
            titulo,
            texto,
            imagem,
            fk_idUsuario,
            data_publicacao
        )
        VALUES
        (
            '$titulo',
            '$texto',
            '$nome_imagem',
            $autor,
            '$data_publicacao'
        )
    ");

    if ($sql) {

        // ID do artigo recém cadastrado
        $idArtigo = mysqli_insert_id($conn);

        // Cadastra as tags
        foreach ($tags as $idTag) {

            $idTag = (int)$idTag;

            mysqli_query($conn, "
                INSERT INTO artigo_tag
                (
                    fk_idArtigo,
                    fk_idTag
                )
                VALUES
                (
                    $idArtigo,
                    $idTag
                )
            ");
        }

        header("Location: /dashboard/artigos/index.php");
        exit;
    } else {

        echo "Erro ao cadastrar artigo: " . mysqli_error($conn);

    }

}
