<?php

class PolishCalculator
{

    public function calculate($operation)
    {
    	return (int) $operation{0} + (int) $operation{1};
    }
}
