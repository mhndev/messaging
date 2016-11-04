<?php
namespace mhndev\messaging;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;

/**
 * Class PhpSendMailTransporter
 * @package mhndev\messaging
 */
class PhpSendMailTransporter implements iTransporter
{

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

        $endPoint = $this->setMultipleTo($message->getEndpoint());

        $header = [];

        if($message->isHtml()){
            $header[] = 'MIME-Version: 1.0';
            $header[] = 'Content-type: text/html; charset=UTF-8';
        }

        if($message->getFrom()){
            $header[] = "From:".$message->getFrom();
        }

        if($message->getCc()){
            $header[] = "Cc:".$message->getCc();
        }

        if($message->getBcc()){
            $header[] = "Bcc:".$message->getBcc();
        }

        if($message->isReply()){
            $header[] = "Reply-To:". $message->getReplyTo();
        }

        $body = $message->getBody();

        // In case any of our lines are larger than 70 characters
        //$body = wordwrap($message->getBody(), 70, "\r\n");

        $header = empty($header)? null : implode("\r\n", $header);


        $result = mb_send_mail($endPoint, $this->persianCompatible($message->getSubject()), $body, $header);

        return $result;
    }


    /**
     * @param $to
     * @return string
     */
    protected function setMultipleTo($to)
    {
        if(is_array($to) && !empty($to[0])){
            $result = [];

            foreach ($to as $receiver){
                $result[] = $this->setSingleTo($receiver);
            }
            return implode(',',$result);
        }

        else{
            return $this->setSingleTo($to);
        }


    }

    /**
     * @param $to
     * @return string
     * @throws \Exception
     */
    protected function setSingleTo($to)
    {
        if(is_array($to) && isAssoc($to)){

            $userName = $to[array_keys($to)[0]];
            $userMail = array_keys($to)[0];

            return  $this->persianCompatible($userName). ' <' .$userMail.'>';
        }

        elseif (is_string($to)){
            return $to;
        }

        else{
            throw new \Exception('badly formatted email To');
        }
    }


    /**
     * @param $name
     * @return string
     */
    private function persianCompatible($name)
    {
        return "=?UTF-8?B?".base64_encode($name)."?=";
    }
}
