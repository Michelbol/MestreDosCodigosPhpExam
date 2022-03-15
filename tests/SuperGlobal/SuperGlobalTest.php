<?php

namespace SuperGlobal;

use PHPUnit\Framework\TestCase;

class SuperGlobalTest extends TestCase
{
    public function testError()
    {
        include_once("superglobal/index.php");
        $this->expectOutputString('B C');
    }
}