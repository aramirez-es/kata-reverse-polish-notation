<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PolishCalculatorSpec extends ObjectBehavior
{
	public function let()
    {
        $this->beConstructedWith(new \OperatorFactory());
    }

	public function it_should_add_two_numbers()
	{
		$this->calculate("1 1 +")->shouldReturn(2);
		$this->calculate("1 2 +")->shouldReturn(3);
		$this->calculate("5 3 +")->shouldReturn(8);
	}

	public function it_should_add_three_numbers()
	{
		$this->calculate("1 2 3 + +")->shouldReturn(6);
		$this->calculate("4 1 7 + +")->shouldReturn(12);
	}

	public function it_should_add_as_numbers_as_given()
	{
		$this->calculate("1 2 3 4 5 6 7 8 9 + + + + + + + +")->shouldReturn(45);
		$this->calculate("3 4 2 9 1 + + + +")->shouldReturn(19);
	}

	public function it_should_add_numbers_when_plus_operator_is_mixed()
	{
		$this->calculate("5 1 2 + 4 + +", 12);
		$this->calculate("5 1 2 + 4 + + 6 8 + +", 26);
		$this->calculate("5 1 2 + 4 + + 6 8 + 4 5 6 4 + + 4 + + + +", 26);
	}

	public function it_should_subtract_two_numbers()
	{
		$this->calculate("1 1 -")->shouldReturn(0);
		$this->calculate("1 2 -")->shouldReturn(-1);
		$this->calculate("2 1 -")->shouldReturn(1);
	}

	public function it_should_subtract_three_numbers()
	{
		$this->calculate("1 2 3 - -")->shouldReturn(2);
		$this->calculate("4 1 7 - -")->shouldReturn(10);
	}

	public function it_should_add_and_subtract_numbers()
	{
		$this->calculate("4 5 + 9 -")->shouldReturn(0);
		$this->calculate("1 2 3 + -")->shouldReturn(-4);
		$this->calculate("5 1 2 + 4 - - 6 8 + 4 5 6 4 + - 4 - + - -", -7);
	}

	public function it_should_multiply_numbers()
	{
		$this->calculate("2 6 *")->shouldReturn(12);
		$this->calculate("6 1 *")->shouldReturn(6);
	}

	public function it_should_divide_numbers()
	{
		$this->calculate("2 4 /")->shouldReturn(0.5);
		$this->calculate("6 1 /")->shouldReturn(6);
		$this->calculate("6 2 /")->shouldReturn(3);
		$this->calculate("2 6 /")->shouldReturn(1/3);
	}

	public function it_should_calculate_complete_operations()
	{
		$this->calculate("5 1 2 + 4 * + 3 -")->shouldReturn(14);
		$this->calculate("2 5 3 + *")->shouldReturn(16);
		$this->calculate("2 1 12 3 / - +")->shouldReturn(-1);
	}

	public function it_should_throw_exception_when_divide_by_zero()
	{
        $this->shouldThrow('\RuntimeException')->during('calculate', ["7 0 /"]);
	}

	public function it_should_throw_exception_when_more_operator_than_numbers()
	{
        $this->shouldThrow('\RuntimeException')->during('calculate', ["7 7 / /"]);
	}

	public function it_should_throw_exception_when_more_numbers_than_operators()
	{
        $this->shouldThrow('\RuntimeException')->during('calculate', ["7 7 7 7 +"]);
	}

	public function it_should_trim_if_more_than_one_space()
	{
		$this->calculate("2 1 12 3 / -  +")->shouldReturn(-1);
	}

	public function it_should_throw_exception_when_unexpected_symbol()
	{
        $this->shouldThrow('\RuntimeException')->during('calculate', ["7 4 b"]);
	}
}
