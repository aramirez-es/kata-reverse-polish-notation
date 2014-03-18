<?php

class PolishCalculator
{

    public function calculate($operation)
    {
    	$sum = 0;
    	foreach (str_split($operation) as $index => $operand) {
	    	if (is_int((int)$operand)) {
	    		$sum += $operand;
	    	}
    	}
    	return $sum;
    }
}
