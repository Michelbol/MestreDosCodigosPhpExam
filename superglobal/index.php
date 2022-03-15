<?php

function answerSuperGlobal(): string
{
    $options['$_GOT'] = 'A';
    $options['$_ENV'] = 'B';
    $options['$_COOKIES'] = 'C';
    $options['$_POS'] = 'D';

    $result = "{$options['$_ENV']} {$options['$_COOKIES']}";
    echo $result;
    return $result;
}
answerSuperGlobal();