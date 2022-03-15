<?php

namespace Variables;

use PHPUnit\Framework\TestCase;

class VariablesTest extends TestCase
{

    public function testVariable()
    {
        include_once('./variables/index.php');
        $this->expectOutputString('B E G');
    }

}