<?php

namespace Calculator;

use Exception;

class SubExpression
{
    private string $firstNumber;

    private string $secondNumber;

    private Operation $operation;

    private string $result;

    private bool $openOperation;

    public function __construct()
    {
        $this->openOperation = false;
        $this->firstNumber = "";
        $this->secondNumber = "";
    }

    public function __toString(): string
    {
        return "$this->firstNumber$this->operation$this->secondNumber";
    }

    /**
     * @return void
     * @throws Exception
     */
    public function calc()
    {
        $this->result = $this->operation->calc($this->firstNumber, $this->secondNumber);
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
     * @param Operation $operation
     */
    public function setOperation(Operation $operation): void
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
}
