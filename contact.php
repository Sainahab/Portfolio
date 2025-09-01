<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$body = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];
$okMessage = 'Your message was successfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting your message. Please try again later';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = gethostname();  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'do_not_reply@sainahab.us';                 // SMTP username
            $mail->Password = 'Saintahab123@';                            // SMTP password
            $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;      
            


    //Recipients
    $mail->setFrom('dev@sainahab.us', 'Portfolio Contact Form');
    //$mail->setFrom('Donot-reply@signworks.ma', 'Website Contact Form');
    $mail->addAddress('Do_not-reply@sainahab.us');     // Add a recipient



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = ($_POST["subjecto"]);
    $mail->Body = (
        '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @font-face{font-family:Ubuntu-Bold;src:url(../fonts/ubuntu/Ubuntu-Bold.ttf)}*{margin:0;padding:0;box-sizing:border-box}body,html{height:100%;font-family:Ubuntu-Bold,sans-serif}a{font-family:Ubuntu-Bold;font-size:14px;line-height:1.7;color:#666;margin:0;transition:all .4s;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s}a:focus{outline:none!important}a:hover{text-decoration:none}h1,h2,h3,h4,h5,h6{margin:0}p{font-family:Ubuntu-Bold;font-size:14px;line-height:1.7;color:#666;margin:0}ul,li{margin:0;list-style-type:none}input{outline:none;border:none}input[type=number]{-moz-appearance:textfield;appearance:none;-webkit-appearance:none}input[type=number]::-webkit-outer-spin-button,input[type=number]::-webkit-inner-spin-button{-webkit-appearance:none}textarea{outline:none;border:none}textarea:focus,input:focus{border-color:transparent!important}input::-webkit-input-placeholder{color:#0b0b0b}input:-moz-placeholder{color:#0b0b0b}input::-moz-placeholder{color:#0b0b0b}input:-ms-input-placeholder{color:#0b0b0b}textarea::-webkit-input-placeholder{color:#0b0b0b}textarea:-moz-placeholder{color:#0b0b0b}textarea::-moz-placeholder{color:#0b0b0b}textarea:-ms-input-placeholder{color:#080809}button{outline:none!important;border:none;background:0 0}button:hover{cursor:pointer}iframe{border:none!important}.container{max-width:1200px}.container-contact100{width:100%;min-height:100vh;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:center;align-items:center;padding:15px;position:relative;background-color:#f2f2f2}.wrap-contact100{width:550px;background:0 0;padding:50px 0 160px}.contact100-form{width:100%}.contact100-form-title{display:block;font-size:30px;color:#403866;line-height:1.2;text-transform:uppercase;text-align:center;padding-bottom:49px}.wrap-input100{width:100%;background-color:#fff;border-radius:31px;margin-bottom:16px;position:relative;z-index:1}.input100{position:relative;display:block;width:100%;background:#fff;border-radius:31px;font-family:Ubuntu-Bold;font-size:18px;color:black;line-height:1.2}input.input100{height:62px;padding:0 35px}textarea.input100{min-height:169px;padding:19px 35px 0}.focus-input100{display:block;position:absolute;z-index:-1;width:100%;height:100%;top:0;left:50%;-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);-ms-transform:translateX(-50%);-o-transform:translateX(-50%);transform:translateX(-50%);border-radius:31px;background-color:#fff;pointer-events:none;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.input100:focus+.focus-input100{width:calc(100% + 20px)}.container-contact100-form-btn{display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:center;padding-top:10px}.contact100-form-btn{display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;padding:0 20px;min-width:150px;height:62px;background-color:transparent;border-radius:31px;font-family:Ubuntu-Bold;font-size:16px;color:#fff;line-height:1.2;text-transform:uppercase;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s;position:relative;z-index:1}.contact100-form-btn::before{content:"";display:block;position:absolute;z-index:-1;width:100%;height:100%;top:0;left:50%;-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);-ms-transform:translateX(-50%);-o-transform:translateX(-50%);transform:translateX(-50%);border-radius:31px;background-color:#827ffe;pointer-events:none;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.contact100-form-btn:hover:before{background-color:#403866;width:calc(100% + 20px)}.emailTitle{padding: 10px 30px;font-size: large;font-weight: bold;}.cancel{min-height: 0px !important;}.validate-input{position:relative}.alert-validate::before{content:attr(data-validate);position:absolute;z-index:1000;max-width:70%;background-color:#fff;border:1px solid #c80000;border-radius:14px;padding:4px 25px 4px 10px;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%);right:10px;pointer-events:none;font-family:Ubuntu-Bold;color:#c80000;font-size:13px;line-height:1.4;text-align:left;visibility:hidden;opacity:0;-webkit-transition:opacity .4s;-o-transition:opacity .4s;-moz-transition:opacity .4s;transition:opacity .4s}.alert-validate::after{content:"\f06a";font-family:FontAwesome;display:block;position:absolute;z-index:1100;color:#c80000;font-size:16px;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%);right:16px}.alert-validate:hover:before{visibility:visible;opacity:1}@media(max-width:992px){.alert-validate::before{visibility:visible;opacity:1}}
    </style>
</head>
<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <div class="contact100-form validate-form">
                <span class="contact100-form-title">
                    You Got a Message From your portfolio page
                </span>
                <div class="emailTitle">Name :</div>
                <div class="wrap-input100 validate-input">
                    <textarea class="input100 cancel" name="message">' . $name . '</textarea>
                </div>
                <div class="emailTitle" >Email :</div>
                <div class="wrap-input100 validate-input">
                    <textarea class="input100 cancel" name="message">' . $email . '</textarea>
                </div>
                <div class="emailTitle">Message :</div>
                <div class="wrap-input100 validate-input">
                    <textarea class="input100" name="message">' . $body . '</textarea>
                </div>
            </div>
        </div>
    </div>
</body>
</html>');
    $mail->send();
    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
?>