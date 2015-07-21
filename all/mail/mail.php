<?php
require_once 'PHPMailer-master1/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Username = "imladrisol@gmail.com";
$mail->Password = "Imladris0079";

$mail->From = 'newuser';
$mail->FromName = "olga";

$mail->addAddress("imladris@list.ru");
$mail->Subject = "Text subject";
$mail->Body = "This is letter's body";
$isSent = $mail->send();

if($isSent){
    echo "Success";
}
else{
    echo "Error";
}