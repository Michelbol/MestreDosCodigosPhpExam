<?php

namespace Tests\Fibonacci;

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testZero()
    {
        include_once("fibonacci/index.php");
        $this->assertEquals(0, fibonacci(0));
    }

    public function testOne()
    {
        $this->assertEquals(1, fibonacci(1));
    }

    public function testSuccess()
    {
        $this->assertEquals(1, fibonacci(2));
        $this->assertEquals(2, fibonacci(3));
        $this->assertEquals(3, fibonacci(4));
        $this->assertEquals(5, fibonacci(5));
        $this->assertEquals(8, fibonacci(6));
        $this->assertEquals(13, fibonacci(7));
    }

    public function testMestre()
    {
        $this->assertEquals(21, fibonacci(8));
        $this->assertEquals(24157817, fibonacci(37));
    }
}
