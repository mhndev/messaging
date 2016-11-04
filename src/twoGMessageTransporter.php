<?php

namespace mhndev\messaging;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;

class twoGMessageTransporter implements iTransporter
{

    /**
     * @param iMessage $message
     * @return mixed
     * @throws \Exception
     */
    function transport(iMessage $message)
    {

        if(! $message instanceof SmsMessage){
            throw new \Exception(get_class().' just can transport messages which their type is '.SmsMessage::class);
        }
    }
}
