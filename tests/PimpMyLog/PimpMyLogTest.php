<?php

namespace Tests\PimpMyLog;

use PHPUnit\Framework\TestCase;

class PimpMyLogTest extends TestCase
{

    public function testMestreDosCodigosExample()
    {
        include_once('./pimp-my-log/index.php');
        $this->assertEquals(
            "",
            pimpMyLog("")
        );
    }

    public function testeMestreDosCodigosExample2()
    {
        include_once('./pimp-my-log/index.php');
        $this->assertEquals(
            '***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 **** **** 2523, cvv: ***, exp date: **/****"',
            pimpMyLog('123.123.1.21 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124 1251 1223 2523, cvv: 827, exp date: 09/22"')
        );
    }

    public function testeMestreDosCodigosExample3()
    {
        include_once('./pimp-my-log/index.php');
        $this->assertEquals(
            '***.***.***.*** - [10/Jan/2020:00:23:49 -0300] "POST /payment HTTP/1.0" Credit card 5124 **** **** 2523, cvv ***, expiration date **/**** had the payment refused"',
            pimpMyLog('123.123.123.123 - [10/Jan/2020:00:23:49 -0300] "POST /payment HTTP/1.0" Credit card 5124 1251 1223 2523, cvv 827, expiration date 09/22 had the payment refused"')
        );
    }
    public function testTerminalCall()
    {
        global $argv;
        $argv[1] = '123.123.123.123 - [10/Jan/2020:00:23:49 -0300] "POST /payment HTTP/1.0" Credit card 5124 1251 1223 2523, cvv 827, expiration date 09/22 had the payment refused"';
        include_once('./pimp-my-log/index.php');
        $this->expectOutputString(
            '***.***.***.*** - [10/Jan/2020:00:23:49 -0300] "POST /payment HTTP/1.0" Credit card 5124 **** **** 2523, cvv ***, expiration date **/**** had the payment refused"',
        );
    }
}
