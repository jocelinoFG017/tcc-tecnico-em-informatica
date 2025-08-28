<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // caminho para o autoload do Composer

$para = "jocelinodev@iksaint.com"; // destinatário
$assunto = "Nova mensagem do formulário de contato - Ethernity";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $whatsapp = strip_tags(trim($_POST["whatsapp"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));
    $aceite = isset($_POST["aceite"]) ? "Aceito" : "Não aceito";

    if (empty($nome) || empty($email) || empty($whatsapp) || empty($mensagem) || $aceite != "Aceito") {
        echo "Por favor, preencha todos os campos e aceite os termos.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    // Corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "WhatsApp: $whatsapp\n";
    $corpo .= "Mensagem:\n$mensagem\n";
    $corpo .= "Aceite dos termos: $aceite\n";

    $mail = new PHPMailer(true);

    try {
        // Configurações do SMTP
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST');    // servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USER');
        $mail->Password = getenv('SMTP_PASS');
        $mail->SMTPSecure = 'tls';
        $mail->Port = getenv('SMTP_PORT');

        // Remetente e destinatário
        $mail->setFrom('jocelinodev@iksaint.com', 'Contato Site');
        $mail->addAddress($para);
        $mail->addReplyTo($email, $nome);

        // Conteúdo
        $mail->Subject = $assunto;
        $mail->Body    = $corpo;
        $mail->CharSet = 'UTF-8';

        $mail->send();
        // echo "Mensagem enviada com sucesso! Obrigado por entrar em contato.";
        header("Location: ../Listar/contato.php");
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
    }

} else {
    echo "Método inválido.";
}
?>
