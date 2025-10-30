<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Form data
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

$to = 'fabioigrejateste@gmail.com'; // Your email address

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fabioigrejateste@gmail.com';
    $mail->Password   = 'pjze tjfz kvaw uacc';  // Use app password for Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom($to, 'Portfólio');
    $mail->addAddress($to);
    $mail->addReplyTo($email, $name);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo 'Erro ao enviar: ', $mail->ErrorInfo;
}
?>
