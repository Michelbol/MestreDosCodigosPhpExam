<?php

namespace CountA;

use PHPUnit\Framework\TestCase;

class CountATest extends TestCase
{

    public function testCountAEquals()
    {
        include_once('./count-a/index.php');
        /** Palavra de mesmo tamanho */
        $this->assertEquals(
            "Existem 2 letras 'a' na palavra aba.",
            countA('aba', 3)
        );
    }

    public function testCountASmaller()
    {
        include_once('./count-a/index.php');
        /** Palavra menor */
        $this->assertEquals(
            "Existem 7 letras 'a' na palavra abaabaabaa.",
            countA('aba', 10)
        );
        /** Palavra menor */
        $this->assertEquals(
            "Existem 0 letras 'a' na palavra medicomedicomed.",
            countA('medico', 15)
        );
    }

    public function testCountABigger()
    {
        include_once('./count-a/index.php');
        /** Palavra maior */
        $this->assertEquals(
            "Existem 1 letra 'a' na string ca.",
            countA('cachorro', 2)
        );
    }

}
