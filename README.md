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
