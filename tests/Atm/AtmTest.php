<?php

namespace Atm;

use PHPUnit\Framework\TestCase;

class AtmTest extends TestCase
{

    public function testMestreDosCodigosExample()
    {
        include_once('./atm/index.php');
        $this->assertEquals(
            "[100 => 2, 50 => 1, 20 => 1, 10 => 1, 5 => 1, 1 => 4]",
            atm(289)
        );
    }

    public function testVazio()
    {
        include_once('./atm/index.php');
        $this->assertEquals(
            "Este valor não é válido",
            atm(0)
        );
    }

    public function testFloat()
    {
        include_once('./atm/index.php');
        $this->assertEquals(
            "Este valor não é válido",
            atm(1.5)
        );
    }

    public function testBasicCount()
    {
        include_once('./atm/index.php');
        $this->assertEquals(
            "[100 => 1, 50 => 0, 20 => 0, 10 => 0, 5 => 0, 1 => 0]",
            atm(100)
        );

        $this->assertEquals(
            "[100 => 0, 50 => 1, 20 => 0, 10 => 0, 5 => 0, 1 => 0]",
            atm(50)
        );

        $this->assertEquals(
            "[100 => 0, 50 => 0, 20 => 1, 10 => 0, 5 => 0, 1 => 0]",
            atm(20)
        );

        $this->assertEquals(
            "[100 => 0, 50 => 0, 20 => 0, 10 => 1, 5 => 0, 1 => 0]",
            atm(10)
        );

        $this->assertEquals(
            "[100 => 0, 50 => 0, 20 => 0, 10 => 0, 5 => 1, 1 => 0]",
            atm(5)
        );

        $this->assertEquals(
            "[100 => 0, 50 => 0, 20 => 0, 10 => 0, 5 => 0, 1 => 1]",
            atm(1)
        );
    }

}
