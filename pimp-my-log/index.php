<?php

const IP_REGEX = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
const CREDIT_CARD_REGEX = '/(\d{4}) \d{4} \d{4} (\d{4})/';
const CVV_REGEX = '/(cvv:?) \d+/i';
const EXPIRATION_REGEX = '/(date:?) \d{1,2}\/\d{2,4}/i';

function pimpMyLog(string $log): string
{
    if($log === ""){
        return $log;
    }
    $log = preg_replace(IP_REGEX, '***.***.***.***', $log);
    $log = preg_replace(CREDIT_CARD_REGEX, '$1 **** **** $2', $log);
    $log = preg_replace(CVV_REGEX, '$1 ***', $log);
    return preg_replace(EXPIRATION_REGEX, '$1 **/****', $log);
}
