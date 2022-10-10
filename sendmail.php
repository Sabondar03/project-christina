<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/srcPHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language');
$mail->IsHTML(true);

//От кого письмо
$mail->setFrom('from@example.com', 'Mailer');
//Кому
$mail->addAddress('usikkristina63@gmail.com');

//Тема письма
$mail->Subject = 'Here is the subject';

//Тело письма 
$body = '<h1>Зустрічайте лист</h1>';

if(trim(!empty($_POST['name']))){
  $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
  $body.='<p><strong>E-email:</strong> '.$_POST['email'].'</p>'
}
if(trim(!empty($_POST['message']))){
  $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>'
}

$mail->Body = $body;

if (!$mail->send()) {
  $message = 'Помилка';
}else {
  $message = 'Дані відправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?> 