<?php

namespace mhndev\messaging;

use mhndev\messaging\interfaces\iSmsProvider;
use SoapClient;

/**
 * Class Sms
 * @package mhndev\messaging
 */
class NovinPayamak implements iSmsProvider
{

    private $client = null;

    private $config;

    /**
     * set soap client (get URI from config)
     *
     * @param array $config
     */
    public function __construct(array $config)
    {

        $this->config = $config;

        try {
            $this->client = new SoapClient($config['wsdl'], ['encoding' => $config['encoding'] ] );
        } catch (\Exception $e) {
            return die($e->getMessage());
        }
        return true;
    }


    /**
     * @param $toNumber
     * @param $message
     * @param bool $flash
     * @return bool
     */
    public function send($toNumber, $message, $flash = false)
    {
        try {
            $result = $this->client->Send([
                'Auth' => $this->config['Auth'],
                'Recipients' => [$toNumber],
                'Message' => [$message],
                'Flash' => $flash
            ]);

            var_dump($result->Status);
            die();

        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return true;
    }


}
