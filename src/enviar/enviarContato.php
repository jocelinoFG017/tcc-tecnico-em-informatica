<?php
// Configurações do e-mail
$para = "seuemail@dominio.com"; // coloque aqui seu e-mail
$assunto = "Nova mensagem do formulário de contato - Ethernity";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe e limpa os dados
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $whatsapp = strip_tags(trim($_POST["whatsapp"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));
    $aceite = isset($_POST["aceite"]) ? "Aceito" : "Não aceito";

    // Valida campos obrigatórios
    if ( empty($nome) || empty($email) || empty($whatsapp) || empty($mensagem) || $aceite != "Aceito" ) {
        echo "Por favor, preencha todos os campos e aceite os termos.";
        exit;
    }

    // Monta o corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "WhatsApp: $whatsapp\n";
    $corpo .= "Mensagem:\n$mensagem\n";
    $corpo .= "Aceite dos termos: $aceite\n";

    // Cabeçalhos
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso! Obrigado por entrar em contato.";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
    }

} else {
    echo "Método inválido.";
}
?>
