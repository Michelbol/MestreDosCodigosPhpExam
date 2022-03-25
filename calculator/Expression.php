<?php

namespace Calculator;

use Exception;

class Expression
{
    private string $expression;

    public function __construct(string $expression)
    {

        $this->expression = str_replace(' ', '', $expression);
    }

    /**
     * @return string
     */
    public function calc(): string
    {
        $this->resolvePrecedenceOperators();
        $this->resolveNormalOperators();
        return $this->expression;
    }

    private function resolveNormalOperators()
    {
        $resultExpression = $this->expression;
        $subExpression = new SubExpression();
        for ($i = 0; $i < strlen($this->expression); $i++){
            switch ($this->expression[$i]){
                case ExpressionEnum::PLUS:
                    if($subExpression->isOpenOperation()){
                        $subExpression->calcAndContinue();
                    }
                    $subExpression->startOperation();
                    $subExpression->setOperation(new Plus());
                    break;
                case ExpressionEnum::MINUS:
                    if($subExpression->isOpenOperation()){
                        $subExpression->calcAndContinue();
                    }
                    $subExpression->startOperation();
                    $subExpression->setOperation(new Minus());
                    break;
                default:
                    if($subExpression->isOpenOperation()){
                        $subExpression->concatSecondNumber($this->expression[$i]);
                        break;
                    }
                    $subExpression->concatFirstNumber($this->expression[$i]);
                    break;
            }
        }
        if($subExpression->isOpenOperation()){
            $subExpression->calc();
            $resultExpression = $subExpression->getResult();
        }
        $this->expression = $resultExpression;
    }

    private function replaceResult(SubExpression $subExpression, $expression): array|string
    {
        return str_replace($subExpression, $subExpression->getResult(), $expression);
    }

    private function resolvePrecedenceOperators()
    {
        $resultExpression = $this->expression;
        $subExpression = new SubExpression();
        for ($i = 0; $i < strlen($this->expression); $i++){
            switch ($this->expression[$i]){
                case ExpressionEnum::MULTIPLICATION:
                    if($subExpression->isOpenOperation()){
                        $resultExpression = $this->resolveAndReplace($subExpression, $resultExpression);
                        $subExpression->setFirstNumber($subExpression->getResult());
                        $subExpression->resetSecondNumber();
                    }
                    $subExpression->startOperation();
                    $subExpression->setOperation(new Multi());
                    break;
                case ExpressionEnum::DIV:
                    if($subExpression->isOpenOperation()){
                        $resultExpression = $this->resolveAndReplace($subExpression, $resultExpression);
                        $subExpression->setFirstNumber($subExpression->getResult());
                        $subExpression->resetSecondNumber();
                    }
                    $subExpression->startOperation();
                    $subExpression->setOperation(new Div());
                    break;
                case ExpressionEnum::PLUS:
                case ExpressionEnum::MINUS:
                    if($subExpression->isOpenOperation()){
                        $resultExpression = $this->resolveAndReplace($subExpression, $resultExpression);
                        $subExpression->setFirstNumber($subExpression->getResult());
                        $subExpression->stopOperation();
                        $subExpression->resetSecondNumber();
                        break;
                    }
                    $subExpression->resetNumbers();
                    $subExpression->stopOperation();
                    break;
                default:
                    if($subExpression->isOpenOperation()){
                        $subExpression->concatSecondNumber($this->expression[$i]);
                        break;
                    }
                    $subExpression->concatFirstNumber($this->expression[$i]);
                    break;
            }
        }
        if($subExpression->isOpenOperation()){
            $resultExpression = $this->resolveAndReplace($subExpression, $resultExpression);
        }
        $this->expression = $resultExpression;
    }

    private function resolveAndReplace(SubExpression $subExpression, $resultExpression): array|string
    {
        try {
            $subExpression->calc();
        }catch (Exception $e){
            $subExpression->setResult($e->getMessage());
            return $subExpression->getResult();
        }
        return $this->replaceResult($subExpression, $resultExpression);
    }
}
