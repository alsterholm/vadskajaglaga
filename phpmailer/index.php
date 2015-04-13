<?php

require_once 'lib/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP(); //vi vill använda smtp
$mail->SMTPAuth = true; 
$mail->SMTPDebug = 4; //2=meddelande, 1= meddelande och errorcodes

$mail->Host = 'smtp.gmail.com';
$mail->Username = 'testaren7@gmail.com';
$mail->Password = 'hejhejhej';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->From = 'emil.kicken@gmail.com';
$mail->FromName = 'Emil Andersson';
//$mail->addReplyTo('reply@blablabla.se');
$mail->addAddress('e.andersson22@gmail.com', 'Emil Andersson');

$mail->Subject = 'test';
$mail->Body = 'Detta är själva meddelandet';

var_dump($mail->send());
?>
