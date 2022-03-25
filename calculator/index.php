<?php

use Calculator\Expression;

function expression($expression): string
{
    return (new Expression($expression))->calc();
}

