<?php

use Calculator\Expression;

function expression($expression): string
{
    return (new Expression($expression))->calc();
}

if(isset($argv[1])){
    echo expression($argv[1]);
}

