<?php

class PolishCalculator
{

    public function calculate($operation)
    {
    	if (is_int((int)$operation{2})) {
    		return (int) $operation{0} + (int) $operation{1} + (int) $operation{2};
    	}
    	return (int) $operation{0} + (int) $operation{1};
    }
}
