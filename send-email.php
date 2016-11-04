<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "vendor/autoload.php";

$messageBody = render_html('data/template.php');


$messageTo = ['majid_hosseini70@yahoo.com' => 'Majid Abdolhosseini Receiver'];
$message = new \mhndev\messaging\EmailMessage($messageTo, $messageBody);

$message->setSubject('Payam It Works ! event Html template ! :))');

$message->setCc('naderi.payam@gmail.com');

$message->setFrom(['majid8911303@gmail.com' => 'Majid Abdolhosseini Sender']);
$message->setIsHtml(true);



$transporter = new \mhndev\messaging\SmtpSwiftTransporter('smtp.gmail.com', 465, 'ssl' ,'majid8911303@gmail.com','email password');

$transporter->transport($message);
