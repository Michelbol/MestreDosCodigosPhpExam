<?php

namespace Calculator;

use Exception;

interface Operation
{
    /**
     * @param string $first
     * @param string $second
     * @return float
     * @throws Exception
     */
    public function calc(string $first, string $second): float;

    public function __toString(): string;
}
