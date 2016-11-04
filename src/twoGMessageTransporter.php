<?php

namespace mhndev\messaging;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iSmsProvider;
use mhndev\messaging\interfaces\iTransporter;

class twoGMessageTransporter implements iTransporter
{

    /**
     * @var iSmsProvider
     */
    protected $provider;

    /**
     * @param iSmsProvider $provider
     * @return $this
     */
    public function setProvider(iSmsProvider $provider)
    {
        $this->provider = $provider;

        return $this;
    }


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

        return $this->provider->send($message->getEndpoint(), $message->getBody());
    }
}
