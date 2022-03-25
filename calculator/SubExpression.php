<?php

class SubExpression
{
    private string $firstNumber;

    private string $secondNumber;

    private string $operation;

    private string $result;

    private bool $openOperation;

    public function __construct()
    {
        $this->openOperation = false;
        $this->firstNumber = "";
        $this->secondNumber = "";
    }

    public function toString(): string
    {
        return "$this->firstNumber$this->operation$this->secondNumber";
    }

    /**
     * @return void
     * @throws Exception
     */
    public function calc()
    {
        $this->result = match ($this->operation) {
            ExpressionEnum::PLUS => $this->resolveSimplePlusExpression(),
            ExpressionEnum::MINUS => $this->resolveSimpleMinusExpression(),
            ExpressionEnum::MULTIPLICATION => $this->resolveSimpleMultiExpression(),
            ExpressionEnum::DIV => $this->resolveSimpleDivExpression(),
        };
    }

    public function calcAndContinue()
    {
        $this->calc();
        $this->setFirstNumber("{$this->getResult()}");
        $this->resetSecondNumber();
    }

    /**
     * @return bool
     */
    public function isOpenOperation(): bool
    {
        return $this->openOperation;
    }

    public function startOperation()
    {
        $this->openOperation = true;
    }

    public function stopOperation()
    {
        $this->openOperation = false;
    }

    public function resetSecondNumber()
    {
        $this->secondNumber = "";
    }

    public function resetFirstNumber()
    {
        $this->firstNumber = "";
    }

    public function resetNumbers()
    {
        $this->resetFirstNumber();
        $this->resetSecondNumber();
    }

    public function concatFirstNumber(string $firstNumber): void
    {
        $this->firstNumber .= $firstNumber;
    }

    /**
     * @param string $firstNumber
     */
    public function setFirstNumber(string $firstNumber): void
    {
        $this->firstNumber = $firstNumber;
    }

    /**
     * @param string $secondNumber
     */
    public function concatSecondNumber(string $secondNumber): void
    {
        $this->secondNumber .= $secondNumber;
    }

    /**
     * @param string $operation
     */
    public function setOperation(string $operation): void
    {
        $this->operation = $operation;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult(string $result): void
    {
        $this->result = $result;
    }


    private function resolveSimplePlusExpression(): float
    {
        return floatval($this->firstNumber) + floatval($this->secondNumber);
    }

    private function resolveSimpleMinusExpression(): float
    {
        return floatval($this->firstNumber) - floatval($this->secondNumber);
    }

    /**
     * @return float|int
     * @throws Exception
     */
    private function resolveSimpleDivExpression(): float|int
    {
        $this->secondNumber = floatval($this->secondNumber);
        if($this->secondNumber == 0){
            throw new Exception("Erro de divisão por 0");
        }
        return floatval($this->firstNumber) / $this->secondNumber;
    }

    private function resolveSimpleMultiExpression(): float|int
    {
        return floatval($this->firstNumber) * floatval($this->secondNumber);
    }

}
