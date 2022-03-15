<?php

namespace Atm;

use PHPUnit\Framework\TestCase;

class AtmTest extends TestCase
{

    public function testCountABigger()
    {
//        valor = 289
//retorno = [100 => 2, 50 => 1, 20 => 1, 10 => 1, 5 => 1, 1 => 4]
        /** Palavra maior */
        $this->assertEquals(
            "Existem 1 letra 'a' na string ca.",
            countA('cachorro', 2)
        );
    }

    public function testVazio()
    {
//        valor = 0
//retorno = Este valor não é válido
    }

}