<?php

class OperatorFactory
{
	const OPERATOR_ADD = '+';
	const OPERATOR_SUBTRACT = '-';
	const OPERATOR_MULTIPLY = '*';
    const OPERATOR_DIVIDE = '/';

    private static $operators = [
    	self::OPERATOR_ADD, 
    	self::OPERATOR_SUBTRACT, 
    	self::OPERATOR_MULTIPLY,
        self::OPERATOR_DIVIDE
    ];

	public function isOperator($symbol)
    {
        return in_array($symbol, self::$operators, true);
    }

    public function build($operator, $a, $b)
    {
    	$operator_class = null;

        switch ($operator) {
            case self::OPERATOR_ADD:
                $operator_class = new Operator\Add($a, $b);
                break;
            case self::OPERATOR_SUBTRACT:
                $operator_class = new Operator\Subtract($a, $b);
                break;
            case self::OPERATOR_MULTIPLY:
                $operator_class = new Operator\Multiply($a, $b);
                break;
            case self::OPERATOR_DIVIDE:
                $operator_class = new Operator\Divide($a, $b);
                break;
        }

        return $operator_class;
    }

    public function run($symbol, $a, $b)
    {
        return $this->build($symbol, $a, $b)->run();
    }
}