<?php

namespace Variables;

use Exception;

class Variable
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function validate(): bool
    {
        return preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $this->name) === 1;
    }
}