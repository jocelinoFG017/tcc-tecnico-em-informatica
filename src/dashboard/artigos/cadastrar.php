<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("../../conexao/conexao.php");


if (isset($_POST['cadastrar'])) {

     $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
     $texto = mysqli_real_escape_string($conn,trim($_POST['texto']));
     $autor = mysqli_real_escape_string($conn,trim($_POST['autor']));
     $tag = mysqli_real_escape_string($conn,trim($_POST['tag']));
     $tag2 = mysqli_real_escape_string($conn,trim($_POST['tag2']));
     $tag3 = mysqli_real_escape_string($conn,trim($_POST['tag3']));

     $foto = $_FILES["foto"];
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
        
        // Largura máxima em pixels
        $largura = 500;
        // Altura máxima em pixels
        $altura = 500;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 100000;

        $error = array();

        // Verifica se o arquivo é uma foto
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $error[1] = "Isso não é uma foto.";
            } 
    
        // Pega as dimensões da foto
        $dimensoes = getimagesize($foto["tmp_name"]);
    
        // Verifica se a largura da foto é maior que a largura permitida
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da foto não deve ultrapassar ".$largura." pixels";
        }

        // Verifica se a altura da foto é maior que a altura permitida
        if($dimensoes[1] > $altura) {
            $error[3] = "Altura da foto não deve ultrapassar ".$altura." pixels";
        }
        
        // Verifica se o tamanho da foto é maior que o tamanho permitido
        if($foto["size"] > $tamanho) {
                $error[4] = "A foto deve ter no máximo ".$tamanho." bytes";
        }

        // Se não houver nenhum erro
        if (count($error) == 0) {
        
            // Pega extensão da foto
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a foto
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a foto
            $caminho_imagem = "../../fotos/" . $nome_imagem;

            // Faz o upload da foto para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            $sql = mysqli_query($conn, "INSERT INTO artigo (titulo, texto, autor, tag, tag2, tag3, foto) 
                                                        VALUES ('$titulo', '$texto', '$autor', '$tag', '$tag2', '$tag3', '$nome_imagem')");

            // Se os dados forem inseridos com sucesso
            if ($sql){
                // echo "Foto cadastrada com sucesso.";
                header('Location: /dashboard/artigos/index.php');
            }
        }
        // Se houver mensagens de erro, exibe-as
        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }
}
?>