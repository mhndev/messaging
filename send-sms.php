<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "vendor/autoload.php";


$novinPayamak = new \mhndev\messaging\NovinPayamak([
    'wsdl' => 'http://www.novinpayamak.com/services/SMSBox/wsdl',
    'Auth'=> [
        'number'=> '50005725045',
        'pass'=>'password',
    ],
    'encoding' => 'UTF-8'
]);

$message = new \mhndev\messaging\SmsMessage('09355497674', 'Mr Naderi Sms works too ;). good night.');
$result = (new \mhndev\messaging\twoGMessageTransporter())->setProvider($novinPayamak)->transport($message);

var_dump($result);
die();
