<?php

namespace Calculator;

require_once('calculator/Expression.php');

use Expression;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testBasicIntExpression()
    {
        $expression = new Expression("2+2");
        $this->assertEquals(
            4,
            $expression->calcExpression()
        );
        $expression = new Expression("2-2");
        $this->assertEquals(
            0,
            $expression->calcExpression()
        );

        $expression = new Expression("2*2");
        $this->assertEquals(
            4,
            $expression->calcExpression()
        );

        $expression = new Expression("2/2");
        $this->assertEquals(
            1,
            $expression->calcExpression()
        );
    }

    public function testBasicFloatExpression()
    {
        $expression = new Expression("2+1.5");
        $this->assertEquals(
            3.5,
            $expression->calcExpression()
        );
        $expression = new Expression("2-1.5");
        $this->assertEquals(
            0.5,
            $expression->calcExpression()
        );

        $expression = new Expression("2*1.5");
        $this->assertEquals(
            3,
            $expression->calcExpression()
        );

        $expression = new Expression("3/2");
        $this->assertEquals(
            1.5,
            $expression->calcExpression()
        );
    }

}
