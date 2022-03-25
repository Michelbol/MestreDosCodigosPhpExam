<?php

namespace Calculator;

class Minus implements Operation
{
    public function calc(string $first, string $second): float
    {
        return floatval($first) - floatval($second);
    }

    public function __toString(): string
    {
        return "-";
    }
}
