<?php

namespace mhndev\messaging;
use mhndev\messaging\interfaces\iMessage;

/**
 * Class EmailMessage
 * @package mhndev\messaging
 */
class EmailMessage extends aMessage implements iMessage
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
     * EmailMessage constructor.
     * @param $endPoint
     * @param $body
     * @param $subject
     * @param null $from
     * @param $cc
     * @param $bcc
     */
    public function __construct($endPoint, $body, $subject, $from = null, $cc = null, $bcc = null)
    {
        parent::__construct($endPoint, $body);

        $this->subject = $subject;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->from = $from;
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


}
