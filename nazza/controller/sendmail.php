<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

//require_once __DIR__ . '/../config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Pour utiliser SMTP ↓ 

    //Server settings
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = "nazza.php@gmail.com";                // SMTP username email d'envoi
    $mail->Password = "Nazza666";                                // SMTP password
    $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom("nazza.php@gmail.com", "Le facteur de l'internet du futur");
    $mail->addAddress($destination); //destinataire
    //$mail->addReplyTo('www-data@debianlamp.business.lan', 'owo');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    if (isset($pj)) {
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment($pj, $nompj);    // Optional name
    }
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}