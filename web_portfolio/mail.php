<head>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';
require 'config.php';

//Create an instance; passing `true` enables exceptions
function sendMail($name, $email, $message){
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = MAILHOST; 
        $mail->Username   = USERNAME;                     //SMTP username
        $mail->Password   = PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;  
    
        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
        $mail->addAddress(SEND_FROM); 
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true); 
    
        $mail->Subject = 'Web Portfolio Contact Submission';
        $mail->Body    = "<p><strong>Name:</strong> $name</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Message:</strong> $message</p>";

        $mail->send();
        return 'success';

    }catch (Exception $e){
        error_log('Mailer Error: ' . $mail->ErrorInfo);
        return 'Mailer Error: ' . $e->ErrorInfo;
        }

    }

?>