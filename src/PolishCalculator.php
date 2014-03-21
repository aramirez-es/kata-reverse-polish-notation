<?php

class PolishCalculator
{
    private $operators = ['+', '-', '*'];

    public function calculate($operation)
    {
    	$result = 0;
        $stack = [];

        foreach(str_split($operation) as $symbol) {
            if ($this->isOperator($symbol)) {
                $stack[] = $this->operate($symbol, array_pop($stack), array_pop($stack));
            } else {
                $stack[] = $symbol;
            }
        }

    	return $stack[0];
    }

    private function isOperator($symbol)
    {
        return in_array($symbol, $this->operators, true);
    }

    private function operate($operator, $a, $b)
    {
        $result = null;
        
        switch ($operator) {
            case '+':
                $result = $a + $b;
                break;
            case '-':
                $result = $a - $b;
                break;
            case '*':
                $result = $a * $b;
                break;
        }

        return $result;
    }
}
