<?php

require '../vendor/phpmailer/PHPMailer-master/src/Exception.php';
require '../vendor/phpmailer/PHPMailer-master/src/PHPMailer.php';
require '../vendor/phpmailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $email = htmlspecialchars(trim($_POST["email"]));

    if (empty($name) || empty($phone) || empty($email)) {
        echo "Por favor, completa todos los campos del formulario.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, introduce una dirección de correo electrónico válida.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'marcadellfernandez@alumnes.ilerna.com';
        $mail->Password   = 'pzccrvhdpnkbmbzb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('marcadellfernandez@alumnes.ilerna.com', 'Marc Adell Fernández');

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo Mensaje de Contacto desde Wear4Ever';
        $mail->Body    = "
            <h2>Has recibido un nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> {$name}</p>
            <p><strong>Teléfono:</strong> {$phone}</p>
            <p><strong>Correo Electrónico:</strong> {$email}</p>
        ";

        $mail->send();
        header("location: ../thank_you.php");
        exit();
    } catch (Exception $e) {
        echo "Hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Hubo un problema con el envío del formulario. Por favor, inténtalo de nuevo.";
}
?>
