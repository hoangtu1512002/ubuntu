<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'public/PHPMailer/src/Exception.php';
require 'public/PHPMailer/src/PHPMailer.php';
require 'public/PHPMailer/src/SMTP.php';

function send_email($username,$email,$otp)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'hoangtutest12345@gmail.com';             
        $mail->Password   = 'aplsqqikkvoccswr';                              
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587; 

        //Recipients
        $mail->setFrom('hoangtutest12345@gmail.com');
        $mail->addAddress($email); 

        $mail->Subject = 'SHOP';
        $mail->Body    = 'xin chào '.strtoupper($username).' mã xác thực đăng nhập của bạn là: '.$otp .' không cung cấp mã này cho bất kì ai.';

        $mail->send();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
