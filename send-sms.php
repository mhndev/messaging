<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "vendor/autoload.php";

$config = include 'config/sms.php';

$novinPayamak = new \mhndev\messaging\NovinPayamak($config['providers']['NovinPayamak']);

$message = new \mhndev\messaging\Message('09355497674', 'Mr Naderi Sms works too ;). good night.');
$result = (new \mhndev\messaging\twoGMessageTransporter())->setProvider($novinPayamak)->transport($message);

var_dump($result);
die();
