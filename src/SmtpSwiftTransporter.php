<?php

namespace mhndev\messaging;

use mhndev\messaging\exceptions\EmailSendFailed;
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
    public function __construct(
        $server = 'localhost',
        $port = 25,
        $security = null,
        $username,
        $password
    )
    {
        $this->transporter = \Swift_SmtpTransport::newInstance($server, $port, $security);


        $this->transporter->setLocalDomain('[127.0.0.1]');

        $this->transporter->setUsername($username);
        $this->transporter->setPassword($password);
    }



    /**
     * @param array $config
     * @return SmtpSwiftTransporter
     */
    public static function FromConfig(array $config)
    {
        return new self(
            $config['address'],
            $config['port'],
            $config['security'],
            $config['username'],
            $config['password']
        );
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
            throw new \Exception(
                sprintf(
                    'Smtp Transport can send messages,which are instance of %s',
                    EmailMessage::class
                )
            );
        }

        $swiftMessage = \Swift_Message::newInstance();
        $swiftMessage->setTo($message->getEndpoint());
        $swiftMessage->setFrom($message->getFrom());


        if($message->hasCc()){
            $swiftMessage->setCc($message->getCc());
        }

        if($message->hasBcc()){
            $swiftMessage->setBcc($message->getBcc());
        }


        if($message->hasSubject()){
            $swiftMessage->setSubject($message->getSubject());
        }

        if($message->hasBody()){
            $swiftMessage->setBody($message->getBody());
        }


        if($message->isHtml()){
            $swiftMessage->setContentType("text/html");
        }

        if($message->getCharset() == 'utf-8'){
            $swiftMessage->setCharset('utf-8');
        }


        $mailer = \Swift_Mailer::newInstance($this->transporter);
        $mailer->send($swiftMessage, $failedRecipients);


        if(!empty($failedRecipients)){
            throw new EmailSendFailed(implode(',', $failedRecipients));
        }

        return $failedRecipients;
    }



}
