<?php

abstract class OperatorFactory
{
	const OPERATOR_ADD = '+';
	const OPERATOR_SUBTRACT = '-';
	const OPERATOR_MULTIPLY = '*';

    private static $operators = [
    	self::OPERATOR_ADD, 
    	self::OPERATOR_SUBTRACT, 
    	self::OPERATOR_MULTIPLY
    ];

	public static function isOperator($symbol)
    {
        return in_array($symbol, self::$operators, true);
    }

    public static function build($operator, $a, $b)
    {
    	$operator_class = null;
    	$result = null;

        switch ($operator) {
            case self::OPERATOR_ADD:
                $operator_class = new Operator\Add($a, $b);
                $result = $operator_class->run();
                break;
            case self::OPERATOR_SUBTRACT:
                $operator_class = new Operator\Subtract($a, $b);
                $result = $operator_class->run();
                break;
            case self::OPERATOR_MULTIPLY:
                $operator_class = new Operator\Multiply($a, $b);
                $result = $operator_class->run();
                break;
        }

        return $result;
    }
}