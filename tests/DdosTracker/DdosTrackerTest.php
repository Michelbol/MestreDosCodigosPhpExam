<?php

namespace DdosTracker;

use PHPUnit\Framework\TestCase;

class DdosTrackerTest extends TestCase
{

    public function testMestreDosCodigosExample()
    {
        include_once('./ddos-tracker/index.php');
        $this->assertEquals(
            "America/Araguaina",
            ddosTracker(createFormattedDateByTimezone('America/Araguaina'))
        );
    }

    public function testWrongValue()
    {
        include_once('./ddos-tracker/index.php');
        $this->assertEquals(
            "Nenhuma zona foi encontrada",
            ddosTracker("2022-01-07 23:11:59")
        );
    }
}
