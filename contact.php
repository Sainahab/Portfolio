<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$body = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];

try {
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'localhost'; //smtp account adress
    $mail->SMTPAuth = off;
    $mail->Username = ''; // SMTP email adress
    $mail->Password = ''; // SMTP above password
    $mail->SMTPSecure = "off";
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Donot-reply@signworks.ma', 'Mailer');
    $mail->AddAddress = ('info@signworks.ma');//email from form
    $mail->addReplyTo('Donot-reply@signworks.ma', 'Information');


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in trolololo!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
}
?>