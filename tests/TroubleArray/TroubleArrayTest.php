<?php

namespace Tests\TroubleArray;

use PHPUnit\Framework\TestCase;

class TroubleArrayTest extends TestCase
{
    public function testError()
    {
        include_once("trouble-array/index.php");
        $this->expectOutputString('A');
    }
}
