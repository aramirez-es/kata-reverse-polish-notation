<?php

namespace Operator;

class Subtract extends Base
{
	public function run()
	{
		return $this->a - $this->b;
	}
}