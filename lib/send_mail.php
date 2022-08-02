<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/SMTP.php";
include "PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
// require 'vendor/autoload.php';
function send_verify_code($receiver, $subject, $body)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                     //Enable verbose debug output
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";                                    //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cholon031@gmail.com';                     //SMTP username
        $mail->Password   = 'ffeehwkusagfldai
';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cholon031@gmail.com', 'Admin');
        $mail->addAddress($receiver);     //Add a recipient

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert(`Message could not be sent. Mailer Error: {$mail->ErrorInfo}`)</script>";
    }
}
function drop_message($userEmail, $password, $userName, $content)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                           //Enable verbose debug output
        $mail->isSMTP();                                //Send using SMTP
        $mail->CharSet  = "utf-8";                      //Send using SMTP

        $mail->Host       = 'smtp.gmail.com';           //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                       //Enable SMTP authentication
        $mail->Username   = $userEmail;                 //SMTP username
        $mail->Password   = $password;                  //SMTP password
        $mail->SMTPSecure = 'tls';                      //Enable implicit TLS encryption
        $mail->Port       = 587;                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($userEmail, $userName);
        $mail->addAddress('quanghiep03198@gmail.com');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Hi Xshop!';
        $mail->Body    = "<p>{$content}</p>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            echo "<script>alert('Message has been sent')</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert(`Message could not be sent. Mailer Error: {$mail->ErrorInfo}`)</script>";
    }
}
