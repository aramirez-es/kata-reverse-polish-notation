<?php

class PolishCalculator
{
    private $factory;

    public function __construct(OperatorFactory $factory)
    {
        $this->factory = $factory;
    }

    public function calculate($operation)
    {
        $stack = [];
        $symbols = array_filter(explode(' ', $operation));

        foreach($symbols as $symbol) {
            if ($this->factory->isOperator($symbol)) {
                if ($this->isThereMoreOperatorsThanNumbers($stack)) {
                    throw new \RuntimeException("Invalid sequence: there are more operators than numbers.");
                }
                $b = array_pop($stack);
                $a = array_pop($stack);
                $stack[] = $this->factory->run($symbol, $a, $b);
            } else {
                $stack[] = (int) $symbol;
            }
        }

        if ($this->isThereMoreNumbersThanOperators($stack)) {
            throw new \RuntimeException("Invalid sequence: there are more numbers than operators.");
        }

    	return reset($stack);
    }

    private function isThereMoreOperatorsThanNumbers(array $stack)
    {
        return count($stack) < 2;
    }

    private function isThereMoreNumbersThanOperators(array $stack)
    {
        return count($stack) > 1;
    }
}
