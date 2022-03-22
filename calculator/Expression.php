<?php

require_once('calculator/ExpressionEnum.php');
require_once('calculator/ExpressionComplexityEnum.php');

class Expression
{
    public string $originalExpression;

    public int $complexity;

    public int $hasPlus;

    public int $hasMinus;

    public int $hasDiv;

    public int $hasMulti;

    public function __construct(string $expression)
    {
        $this->originalExpression = trim($expression);

        $this->hasPlus = strpos($expression, ExpressionEnum::PLUS) > 0;

        $this->hasMinus = strpos($expression, ExpressionEnum::MINUS) > 0;

        $this->hasDiv = strpos($expression, ExpressionEnum::DIV) > 0;

        $this->hasMulti = strpos($expression, ExpressionEnum::MULTIPLICATION) > 0;

        $this->calcComplexity();
    }

    private function calcComplexity(){
        $complex = 0;
        if($this->hasPlus){
            $complex++;
        }
        if($this->hasMinus){
            $complex++;
        }
        if($this->hasDiv){
            $complex++;
        }
        if($this->hasMulti){
            $complex++;
        }
        $this->complexity = $complex;
    }

    public function calcExpression(): float|int
    {
        if($this->complexity === ExpressionComplexityEnum::NUMBER){
            return $this->resolveNumberExpression();
        }
        if($this->complexity === ExpressionComplexityEnum::SIMPLE){
            return $this->resolveSimpleExpression();
        }
        return $this->resolveComplexExpression();
    }

    private function resolveComplexExpression(): float
    {
        return 0;
    }

    private function resolveNumberExpression(): float
    {
        return floatval($this->originalExpression);
    }

    private function resolveSimpleExpression(): float|int
    {
        if($this->hasPlus){
            return $this->resolveSimplePlusExpression();
        }
        if($this->hasMinus){
            return $this->resolveSimpleMinusExpression();
        }
        if($this->hasDiv){
            return $this->resolveSimpleDivExpression();
        }
        return $this->resolveSimpleMultiExpression();
    }

    private function resolveSimplePlusExpression(): float
    {
        $expressions = explode(ExpressionEnum::PLUS, $this->originalExpression);
        return floatval($expressions[0]) + floatval($expressions[1]);
    }

    private function resolveSimpleMinusExpression(): float
    {
        $expressions = explode(ExpressionEnum::MINUS, $this->originalExpression);
        return floatval($expressions[0]) - floatval($expressions[1]);
    }

    private function resolveSimpleDivExpression(): float|int
    {
        $expressions = explode(ExpressionEnum::DIV, $this->originalExpression);
        return floatval($expressions[0]) / floatval($expressions[1]);
    }

    private function resolveSimpleMultiExpression(): float|int
    {
        $expressions = explode(ExpressionEnum::MULTIPLICATION, $this->originalExpression);
        return floatval($expressions[0]) * floatval($expressions[1]);
    }
}
