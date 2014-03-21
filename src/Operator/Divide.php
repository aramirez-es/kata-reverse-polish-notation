<?php

namespace Operator;

class Divide extends Base
{
	public function run()
	{
		if (0 === $this->b) {
			throw new \RuntimeException('You cannot divide by zero.');
		}
		
		return $this->a / $this->b;
	}
}