<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "vendor/autoload.php";

$mailer = new PHPMailer(true);



//service settings
try {
$mailer->SMTPDebug = SMTP::DEBUG_SERVER; //debug mail
$mailer->isSMTP(); // smtp test mail 
$mailer->Host = "sandbox.smtp.mailtrap.io"; // website that testes mails
$mailer->Username = "619af964b142a3"; // get this from mail trap
$mailer->Password = "a65684c05fe694";
$mailer->SMTPAuth = true;
// !mail trap is a website to test mails 
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailer->Port = 2525;
} catch (Exception $e) {
  echo '<pre>';
  var_dump($e);
  echo '</pre>';
}

echo '<pre>';
var_dump($mailer);
echo '</pre>';
// we have set up mail server settings

//@ mail massage 

$mailer->setFrom("yossab@gmail.com", "yossab"); // sent from;
$mailer->addAddress("yossabpro5@gmail.com", "php mailer"); // send to 
$mailer->Subject = "testing php ";
$mailer->addAttachment('composer.json'); // send file
$mailer->Body = "hello from test and body";

echo '<pre>';
var_dump($mailer->send());
echo '</pre>';
//! in production with gmail
// return to this video because you have to do something with security in google
//https://youtu.be/js9kbhREyYM?list=PL7mt2FDjAkPfX30QSw_e8vMctjJQ_PFxa
$mailer->Host = "smtp.gmail.com"; 
$mailer->Username = "your real username"; 
$mailer->Password = "your real password";
// and make sure that the email to send is a real email