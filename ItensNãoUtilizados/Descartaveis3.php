<?php

$imagem = $_FILES["imagem"];
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "test";

if($imagem != NULL) {
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

		mysql_connect($servidor,$usuario,$senha) or die("Impossível Conectar");

		@mysql_select_db($dbname) or die("Impossível Conectar");

		mysql_query("INSERT INTO PESSOA (PES_IMG) VALUES ('$mysqlImg')") or
		die("O sistema não foi capaz de executar a query");

		unlink($nomeFinal);

		header("location:exibir.php");
	}
}
else {
	echo"Você não realizou o upload de forma satisfatória.";
}

?>






// outro codigo
<?php
// Conexão com o banco de dados
$conn = @mysql_connect("localhost", "usuario", "senha") or die ("Problemas na conexão.");
$db = @mysql_select_db("banco", $conn) or die ("Problemas na conexão");

// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {
    
    // Recupera os dados dos campos
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $foto = $_FILES["foto"];
    
    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
        
        // Largura máxima em pixels
        $largura = 150;
        // Altura máxima em pixels
        $altura = 180;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 1000;

        $error = array();

        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $error[1] = "Isso não é uma imagem.";
            } 
    
        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);
    
        // Verifica se a largura da imagem é maior que a largura permitida
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }

        // Verifica se a altura da imagem é maior que a altura permitida
        if($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
        }
        
        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }

        // Se não houver nenhum erro
        if (count($error) == 0) {
        
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = "fotos/" . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            $sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
        
            // Se os dados forem inseridos com sucesso
            if ($sql){
                echo "Você foi cadastrado com sucesso.";
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

// mais umask
<?php
    session_start();
    include("../conexao/conexao.php");

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $descricao = mysqli_real_escape_string($conn,trim($_POST['descricao']));
    $marca = mysqli_real_escape_string($conn,trim($_POST['marca']));
    $quantidade = mysqli_real_escape_string($conn,trim($_POST['quantidade']));
    $preco = mysqli_real_escape_string($conn,trim($_POST['preco']));
    //$imagem = mysqli_real_escape_string($conn,trim($_POST['imagem']));
    
    $sql = "SELECT count(*) as total FROM produto WHERE nome = '$nome'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: ../Dashboard/produtos.php');
        exit;
    }

    $sql = "INSERT INTO produto (nome,descricao,marca,quantidade,preco) VALUES('$nome','$descricao','$marca','$quantidade','$preco')";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    
    }
    $conn->close();
    header('Location: ../Dashboard/produtos.php');
    exit;
?>

//ultimo
<?php
    session_start();
    include("../conexao/conexao.php");

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $descricao = mysqli_real_escape_string($conn,trim($_POST['descricao']));
    $marca = mysqli_real_escape_string($conn,trim($_POST['marca']));
    $quantidade = mysqli_real_escape_string($conn,trim($_POST['quantidade']));
    $preco = mysqli_real_escape_string($conn,trim($_POST['preco']));
    //$imagem = mysqli_real_escape_string($conn,trim($_POST['imagem']));
    
    $sql = "SELECT count(*) as total FROM produto WHERE nome = '$nome'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuarioExiste'] = true;
        header('Location: ../Dashboard/produtos.php');
        exit;
    }

    $sql = "INSERT INTO produto (nome,descricao,marca,quantidade,preco) VALUES('$nome','$descricao','$marca','$quantidade','$preco')";

    if($conn->query($sql) === TRUE){
        $_SESSION['statusCadastro'] = true;
    
    }
    $conn->close();
    header('Location: ../Dashboard/produtos.php');
    exit;
?>








<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >