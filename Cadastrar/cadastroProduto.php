<?php
// Conexão com o banco de dados
include("../conexao/conexao.php");

// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {
    
    // Recupera os dados dos campos
     $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
     $descricao = mysqli_real_escape_string($conn,trim($_POST['descricao']));
     $marca = mysqli_real_escape_string($conn,trim($_POST['marca']));
     $quantidade = mysqli_real_escape_string($conn,trim($_POST['quantidade']));
     $preco = mysqli_real_escape_string($conn,trim($_POST['preco']));
     // $email = $_POST['email'];
     $foto = $_FILES["foto"];
    
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
        
        // Largura máxima em pixels
        $largura = 400;
        // Altura máxima em pixels
        $altura = 400;
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
            $caminho_imagem = "../fotos/" . $nome_imagem;

            // Faz o upload da foto para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            // $sql = mysql_query("INSERT INTO produto VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
            $sql = mysqli_query($conn,"INSERT INTO produto VALUES ('', '".$nome."','".$descricao."','".$marca."','".$quantidade."','".$preco."', '".$nome_imagem."')");
            // Se os dados forem inseridos com sucesso
            if ($sql){
                echo "Foto cadastrada com sucesso.";
                header('Location: ../Dashboard/produtos.php');
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