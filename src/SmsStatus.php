<?php
namespace mhndev\messaging;

/**
 * Class SmsStatus
 * @package mhndev\messaging
 */
class SmsStatus
{

    const Sent_To_Provider = 1;

    const Sent_To_Telecommunications = 2;

    const Sent_To_User = 3;

    const Provider_Not_Processed = 4;

    const Provider_Processing = 5;

    const Receiver_In_BlackList = 6;

    const Server_Processing = 7;

    const Server_Not_Processed = 8;
}
