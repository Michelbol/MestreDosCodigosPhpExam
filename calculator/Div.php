<?php

namespace Calculator;

use Exception;

class Div implements Operation
{
    public function calc(string $first, string $second): float
    {
        $second = floatval($second);
        if ($second == 0) {
            throw new Exception("Erro de divisão por 0");
        }
        return floatval($first) / $second;
    }

    public function __toString(): string
    {
        return "/";
    }
}
