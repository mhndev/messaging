<?php

return [
    'providers' => [
        'NovinPayamak' => [
            'wsdl' => 'http://www.novinpayamak.com/services/SMSBox/wsdl',
            'Auth'=> [
                'number'=> '50005725045',
                'pass'=>'password',
            ],
            'encoding' => 'UTF-8'
        ]


    ]
];
