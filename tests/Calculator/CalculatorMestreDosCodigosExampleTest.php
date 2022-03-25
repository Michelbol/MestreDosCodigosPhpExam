<?php

namespace Calculator;

require_once('calculator/Expression.php');

use Expression;
use PHPUnit\Framework\TestCase;

class CalculatorMestreDosCodigosExampleTest extends TestCase
{
    public function testMestreDosCodigosExample()
    {
        $expression = new Expression("1 + 1");
        $this->assertEquals(
            2,
            $expression->calcExpression()
        );
        $expression = new Expression("3 - 4");
        $this->assertEquals(
            -1,
            $expression->calcExpression()
        );
        $expression = new Expression("2 / 2");
        $this->assertEquals(
            1,
            $expression->calcExpression()
        );
        $expression = new Expression("3 * 3");
        $this->assertEquals(
            9,
            $expression->calcExpression()
        );
        $expression = new Expression("2 + 2 * 3");
        $this->assertEquals(
            8,
            $expression->calcExpression()
        );
        $expression = new Expression("3 * 2.7 + 2");
        $this->assertEquals(
            10.10,
            $expression->calcExpression()
        );
        $expression = new Expression("5 - 15 / 3");
        $this->assertEquals(
            0,
            $expression->calcExpression()
        );
        $expression = new Expression("3 / 0");
        $this->assertEquals(
            "Erro de divisão por 0",
            $expression->calcExpression()
        );
        $expression = new Expression("3 + 1 / 1 * 5 + 1");
        $this->assertEquals(
            9,
            $expression->calcExpression()
        );
    }
}