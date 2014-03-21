<?php

namespace Operator;

abstract class Base
{
	protected $a;
	protected $b;

	public function __construct($a, $b)
	{
		$this->a = $a;
		$this->b = $b;
	}

	abstract public function run();
}