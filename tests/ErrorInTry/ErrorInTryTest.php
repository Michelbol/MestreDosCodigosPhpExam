<?php

namespace Tests\ErrorInTry;

use PHPUnit\Framework\TestCase;

class ErrorInTryTest extends TestCase
{
    public function testError()
    {
        include_once("error-in-try/index.php");
        $this->expectOutputString('D');
    }
}
