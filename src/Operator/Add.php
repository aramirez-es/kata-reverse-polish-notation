<?php

namespace Operator;

class Add extends Base
{
	public function run()
	{
		return $this->a + $this->b;
	}
}