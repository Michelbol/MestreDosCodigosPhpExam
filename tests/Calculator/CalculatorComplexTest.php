<?php

namespace Tests\Calculator;

require_once('calculator/Expression.php');

use Calculator\Expression;
use PHPUnit\Framework\TestCase;

class CalculatorComplexTest extends TestCase
{
    public function testComplexSumOperations()
    {
        $expression = new Expression("2+3+3");
        $this->assertEquals(
            8,
            $expression->calc()
        );
        $expression = new Expression("2+3+3+2");
        $this->assertEquals(
            10,
            $expression->calc()
        );
        $expression = new Expression("2+3+3+2");
        $this->assertEquals(
            10,
            $expression->calc()
        );
        $expression = new Expression("2+3+3+2+7");
        $this->assertEquals(
            17,
            $expression->calc()
        );
        $expression = new Expression("2+1.51235+3");
        $this->assertEquals(
            6.51235,
            $expression->calc()
        );
        $expression = new Expression("2+1.51235+3.2");
        $this->assertEquals(
            6.71235,
            $expression->calc()
        );
        $expression = new Expression("2.3+1.51235+2");
        $this->assertEquals(
            5.81235,
            $expression->calc()
        );
        $expression = new Expression("2.3+1.51235+2.1");
        $this->assertEquals(
            5.91235,
            $expression->calc()
        );
        $expression = new Expression("2.31+1.51235+2");
        $this->assertEquals(
            5.82235,
            $expression->calc()
        );
        $expression = new Expression("2.31+1.51235+2.1");
        $this->assertEquals(
            5.92235,
            $expression->calc()
        );
        $expression = new Expression("3 * 2.7 + 2");
        $this->assertEquals(
            10.10,
            $expression->calc()
        );
    }
    public function testMinusComplex()
    {
        $expression = new Expression("2-2+1");
        $this->assertEquals(
            1,
            $expression->calc()
        );
        $expression = new Expression("2-2+1-2");
        $this->assertEquals(
            -1,
            $expression->calc()
        );
        $expression = new Expression("2-1.5+1");
        $this->assertEquals(
            1.5,
            $expression->calc()
        );
        $expression = new Expression("2.522-1.522+1");
        $this->assertEquals(
            2,
            $expression->calc()
        );
        $expression = new Expression("2.622-1.522-1");
        $this->assertEquals(
            0.1,
            $expression->calc()
        );
        $expression = new Expression("1.5-2.5+1");
        $this->assertEquals(
            0,
            $expression->calc()
        );
    }

    public function testMultiComplex()
    {
        $expression = new Expression("2*2*2");
        $this->assertEquals(
            8,
            $expression->calc()
        );
        $expression = new Expression("2*1.5*2");
        $this->assertEquals(
            6,
            $expression->calc()
        );
        $expression = new Expression("2.5*2*3.5");
        $this->assertEquals(
            17.5,
            $expression->calc()
        );
        $expression = new Expression("2.5*2*3.5-1");
        $this->assertEquals(
            16.5,
            $expression->calc()
        );
        $expression = new Expression("2.5*2*3.5+1");
        $this->assertEquals(
            18.5,
            $expression->calc()
        );
        $expression = new Expression("2/3*3");
        $this->assertEquals(
            2,
            $expression->calc()
        );
        $expression = new Expression("2*3/3");
        $this->assertEquals(
            2,
            $expression->calc()
        );
    }

    public function testBasicDiv()
    {
        $expression = new Expression("3/3*2");
        $this->assertEquals(
            2,
            $expression->calc()
        );
        $expression = new Expression("2/2*5");
        $this->assertEquals(
            5,
            $expression->calc()
        );
        $expression = new Expression("2/0*2");
        $this->assertEquals(
            "Erro de divisão por 0",
            $expression->calc()
        );
        $expression = new Expression("5/2.5/2");
        $this->assertEquals(
            1,
            $expression->calc()
        );
        $expression = new Expression("5.5/2.5/2*2");
        $this->assertEquals(
            2.2,
            $expression->calc()
        );
        $expression = new Expression("7.84/2.24*2/2");
        $this->assertEquals(
            3.5,
            $expression->calc()
        );
    }
}
