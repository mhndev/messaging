<?php

namespace mhndev\messaging;

use mhndev\messaging\exceptions\EmailSendFailed;
use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;
use PHPMailer;

/**
 * Class SmtpPhpMailer
 * @package mhndev\messaging
 */
class SmtpPhpMailer implements iTransporter
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
        $this->transporter = new PHPMailer;


        $this->transporter->SMTPDebug = 3;
        $this->transporter->isSMTP();
        $this->transporter->Host = $server;

        $this->transporter->Port = $port;
        if($security){
            $this->transporter->SMTPSecure = $security;
        }

        $this->transporter->SMTPAuth = true;
        $this->transporter->Username = $username;
        $this->transporter->Password = $password;
    }



    /**
     * @param array $config
     * @return $this
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
            throw new \Exception('Smtp Transport can send messages which are instance of '.EmailMessage::class);
        }

        if($message->getCharset() == 'utf-8'){
            $this->transporter->CharSet = 'utf-8';
        }

        $this->transporter->setFrom($message->getFrom());
        $this->transporter->addAddress($message->getEndpoint());
        $this->transporter->Subject = $message->getSubject();
        $this->transporter->Body    = $message->getBody();

        if($message->isHtml()){
            $this->transporter->isHTML();
        }

        if($message->hasCc()){
            $this->transporter->addCC($message->getCc());
        }

        if($message->hasBcc()){
            $this->transporter->addBCC($message->getBcc());
        }


        if(! $this->transporter->send() ) {
            throw new EmailSendFailed($this->transporter->ErrorInfo);
        }


    }


}
