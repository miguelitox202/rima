<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

$mailer = new PHPMailer();
$mailer->setFrom( $email );
$mailer->addAddress('untalmiguel51@gmail.com','Rima Oil');
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';

$rta = $mailer->send( );

//var_dump($rta);
header("Location: index.html" );