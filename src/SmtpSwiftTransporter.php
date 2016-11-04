<?php

namespace mhndev\messaging;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;

/**
 * Class SmtpSwiftTransporter
 * @package mhndev\messaging
 */
class SmtpSwiftTransporter implements iTransporter
{


    /**
     * @var
     */
    private $transporter;

    /**
     * SmtpSwiftTransporter constructor.
     * @param string $server
     * @param int $port
     * @param null $security
     * @param $username
     * @param $password
     */
    public function __construct($server = 'localhost', $port = 25, $security = null, $username, $password)
    {
        $this->transporter = \Swift_SmtpTransport::newInstance($server, $port, $security);
        $this->transporter->setUsername($username);
        $this->transporter->setPassword($password);
    }

    /**
     * @param iMessage $message
     * @return mixed
     * @throws \Exception
     */
    function transport(iMessage $message)
    {
        /** @var EmailMessage $message */
        if(! $message instanceof EmailMessage){
            throw new \Exception('Smtp Transport can send messages which are instance of '.EmailMessage::class);
        }

        $swiftMessage = \Swift_Message::newInstance();
        $swiftMessage->setTo($message->getEndpoint());
        $swiftMessage->setFrom($message->getFrom());


        $swiftMessage->setCc($message->getCc());
        $swiftMessage->setBcc($message->getBcc());
        $swiftMessage->setSubject($message->getSubject());
        $swiftMessage->setBody($message->getBody());

        $mailer = \Swift_Mailer::newInstance($this->transporter);
        $mailer->send($swiftMessage, $failedRecipients);

        return $failedRecipients;
    }


}
