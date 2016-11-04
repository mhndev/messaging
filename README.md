# Messaging Service


### Test with Gmail mail server
```php
$message = new \mhndev\messaging\EmailMessage(
    'majid_hosseini70@yahoo.com',
    'my message body',
    'my subject',
    'majid8911303@gmail.com',
    'naderi.payam@gmail.com',
    'h.mohayeji@gmail.com'

);

$myEmail = 'sampleUser@gmail.com';
$myEmailPassword = 'password';

$transporter = new \mhndev\messaging\SmtpSwiftTransporter('smtp.gmail.com', 465, 'ssl' , $myEmail, $myEmailPassword);

$transporter->transport($message);

```


### Send Sms

```php
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

```