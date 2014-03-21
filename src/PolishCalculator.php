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
    	$result = 0;
        $stack = [];
        $symbols = str_split($operation);

        foreach($symbols as $symbol) {
            if ($this->factory->isOperator($symbol)) {
                $a = array_pop($stack);
                $b = array_pop($stack);
                $stack[] = $this->factory->run($symbol, $a, $b);
            } else {
                $stack[] = $symbol;
            }
        }

    	return $stack[0];
    }
}
