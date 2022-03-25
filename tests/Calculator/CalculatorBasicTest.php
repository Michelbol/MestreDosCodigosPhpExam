<?php

namespace Calculator;

require_once('calculator/index.php');

use Expression;
use PHPUnit\Framework\TestCase;

class CalculatorBasicTest extends TestCase
{

    public function testSumBasic()
    {
        $expression = new Expression("2+3");
        $this->assertEquals(
            5,
            $expression->calcExpression()
        );
        $expression = new Expression("2+1.51235");
        $this->assertEquals(
            3.51235,
            $expression->calcExpression()
        );
        $expression = new Expression("2.3+1.51235");
        $this->assertEquals(
            3.81235,
            $expression->calcExpression()
        );
        $expression = new Expression("2.31+1.51235");
        $this->assertEquals(
            3.82235,
            $expression->calcExpression()
        );
    }

    public function testMinusBasic()
    {
        $expression = new Expression("2-2");
        $this->assertEquals(
            0,
            $expression->calcExpression()
        );
        $expression = new Expression("2-1.5");
        $this->assertEquals(
            0.5,
            $expression->calcExpression()
        );
        $expression = new Expression("2.522-1.522");
        $this->assertEquals(
            1,
            $expression->calcExpression()
        );
        $expression = new Expression("2.622-1.522");
        $this->assertEquals(
            1.1,
            $expression->calcExpression()
        );
        $expression = new Expression("1.5-2.5");
        $this->assertEquals(
            -1,
            $expression->calcExpression()
        );
    }

    public function testBasicMulti()
    {
        $expression = new Expression("2*2");
        $this->assertEquals(
            4,
            $expression->calcExpression()
        );
        $expression = new Expression("2*1.5");
        $this->assertEquals(
            3,
            $expression->calcExpression()
        );
        $expression = new Expression("2.5*2");
        $this->assertEquals(
            5,
            $expression->calcExpression()
        );
        $expression = new Expression("4.234*9.632");
        $this->assertEquals(
            40.781888,
            $expression->calcExpression()
        );
    }

    public function testBasicDiv()
    {
        $expression = new Expression("3/2");
        $this->assertEquals(
            1.5,
            $expression->calcExpression()
        );
        $expression = new Expression("2/2");
        $this->assertEquals(
            1,
            $expression->calcExpression()
        );
        $expression = new Expression("2/0");
        $this->assertEquals(
            "Erro de divisão por 0",
            $expression->calcExpression()
        );
        $expression = new Expression("5/2.5");
        $this->assertEquals(
            2,
            $expression->calcExpression()
        );
        $expression = new Expression("5.5/2.5");
        $this->assertEquals(
            2.2,
            $expression->calcExpression()
        );
        $expression = new Expression("7.84/2.24");
        $this->assertEquals(
            3.5,
            $expression->calcExpression()
        );
    }
}