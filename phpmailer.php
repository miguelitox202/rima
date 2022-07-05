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
    <p>De: $email</p>
    <h6>Mensaje:</h6>
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