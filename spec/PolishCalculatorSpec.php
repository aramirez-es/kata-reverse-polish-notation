<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PolishCalculatorSpec extends ObjectBehavior
{
	public function it_should_sum_two_numbers()
	{
		$this->calculate("11+")->shouldReturn(2);
		$this->calculate("12+")->shouldReturn(3);
	}
}
