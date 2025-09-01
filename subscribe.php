<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/src/Exception.php';
require __DIR__ . '/src/PHPMailer.php';
require __DIR__ . '/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = gethostname();  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'do_not_reply@sainahab.us';                 // SMTP username
            $mail->Password = 'Saintahab123@';                            // SMTP password
            $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;      
            


    //Recipients
    $mail->setFrom('dev@sainahab.us', 'Portfolio subscribe Form');
    //$mail->setFrom('Donot-reply@signworks.ma', 'Website Contact Form');
    $mail->addAddress('Do_not-reply@sainahab.us');     // Add a recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Newsletter Subscription';
        $mail->Body = "New subscriber email: <b>{$email}</b>";

        $mail->send();
        echo "Thank you for subscribing!";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No email provided.";
}
?>
