<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PolishCalculatorSpec extends ObjectBehavior
{
	public function it_should_add_two_numbers()
	{
		$this->calculate("11+")->shouldReturn(2);
		$this->calculate("12+")->shouldReturn(3);
		$this->calculate("53+")->shouldReturn(8);
	}

	public function it_should_add_three_numbers()
	{
		$this->calculate("123++")->shouldReturn(6);
		$this->calculate("417++")->shouldReturn(12);
	}

	public function it_should_add_as_numbers_as_given()
	{
		$this->calculate("123456789++++++++")->shouldReturn(45);
		$this->calculate("34291++++")->shouldReturn(19);
	}

	public function it_should_add_numbers_when_plus_operator_is_mixed()
	{
		$this->calculate("512+4++", 12);
		$this->calculate("512+4++68+", 26);
		$this->calculate("512+4++68+4564++4++", 26);
	}

	public function it_should_subtract_two_numbers()
	{
		$this->calculate("11-")->shouldReturn(0);
		$this->calculate("12-")->shouldReturn(1);
		$this->calculate("21-")->shouldReturn(-1);
	}

	public function it_should_subtract_three_numbers()
	{
		$this->calculate("123--")->shouldReturn(0);
		$this->calculate("417--")->shouldReturn(2);
	}

	public function it_should_add_and_subtract_numbers()
	{
		$this->calculate("45+9-")->shouldReturn(0);
		$this->calculate("123+-")->shouldReturn(4);
		$this->calculate("512+4--68+4564+-4-+--", -7);
	}
}
