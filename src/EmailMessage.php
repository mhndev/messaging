<?php

namespace mhndev\messaging;
use mhndev\messaging\interfaces\iMessage;

/**
 * Class EmailMessage
 * @package mhndev\messaging
 */
class EmailMessage extends Message implements iMessage
{

    /**
     * @var
     */
    protected $cc;

    /**
     * @var
     */
    protected $bcc;

    /**
     * @var
     */
    protected $subject;

    /**
     * @var
     */
    protected $from;

    /**
     * @var
     */
    protected $attachments;


    /**
     * @var bool
     */
    protected $isReply = false;

    /**
     * @var
     */
    protected $replyTo;

    /**
     * @var
     */
    protected $isHtml;

    /**
     * EmailMessage constructor.
     * @param $endPoint
     * @param $body
     * @param $subject
     * @param null $from
     * @param $cc
     * @param $bcc
     * @param null $replyTo
     */
    public function __construct($endPoint, $body, $subject = 'No Subject' , $from = null, $cc = null, $bcc = null, $replyTo = null)
    {
        parent::__construct($endPoint, $body);

        $this->subject = $subject;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->from = $from;

        if($replyTo){
            $this->setReplyTo($replyTo);
        }
    }


    /**
     * @return bool
     */
    public function getReplyTo()
    {
        if($this->isReply()){
            return $this->replyTo;
        }else{
            return false;
        }
    }

    /**
     * @param $replyTo
     * @return $this
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;
        $this->isReply = true;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @return mixed
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }


    /**
     * @param mixed $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @param mixed $bcc
     * @return $this
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;

        return $this;
    }

    /**
     * @param mixed $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param mixed $from
     * @return $this
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @param mixed $attachments
     * @return $this
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isReply()
    {
        return $this->isReply;
    }

    /**
     * @return mixed
     */
    public function isHtml()
    {
        return $this->isHtml;
    }

    /**
     * @param mixed $isHtml
     * @return $this
     */
    public function setIsHtml($isHtml)
    {
        $this->isHtml = $isHtml;

        return $this;
    }


}
