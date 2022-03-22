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
}
