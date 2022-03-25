<?php

namespace Tests\FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{

    public function testMestreDosCodigosExample()
    {
        include_once('./fizz-buzz/index.php');
        $this->assertEquals(
            1,
            fizzBuzz(1)
        );
        $this->assertEquals(
            2,
            fizzBuzz(2)
        );
        $this->assertEquals(
            'Fizz',
            fizzBuzz(3)
        );
        $this->assertEquals(
            "Buzz",
            fizzBuzz(5)
        );
        $this->assertEquals(
            "FizzBuzz",
            fizzBuzz(15)
        );
    }

    public function testOthers()
    {
        include_once('./fizz-buzz/index.php');
        $this->assertEquals(
            "Buzz",
            fizzBuzz(35)
        );
        $this->assertEquals(
            "FizzBuzz",
            fizzBuzz(45)
        );
    }
}
