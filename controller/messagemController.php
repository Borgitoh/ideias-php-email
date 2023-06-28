<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



function enviarMenssagem($email, $body, $assunto)  {
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'conexaosublime.com';                   
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'kene.borges@conexaosublime.com';                    
        $mail->Password   = 'm;k4ippP*}Gr';                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;   
       
    
        //Recipients
        $mail->setFrom('kenesms@dmdevelopers.co', 'Mailer');  
        $mail->addAddress($email);               
    
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = $assunto;
        $mail->Body    = $body;
        $mail->AltBody =  $body;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function emailValidacao($email, $body){
    try {
        //Server settings
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'conexaosublime.com';                   
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'kene.borges@conexaosublime.com';                    
        $mail->Password   = 'm;k4ippP*}Gr';                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;   
       
    
        //Recipients
        $mail->setFrom('kene.borges@conexaosublime.com', 'Mailer');  
        $mail->addAddress($email);               
    
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Verificação de Email';
        $mail->Body    = $body;
        $mail->AltBody = $body;
    
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
    
}