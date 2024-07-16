<?php

namespace App\Core;


abstract class StateableKernel extends Kernel
{
	/**
	 * @return boolean
	 */
	public function loop() : bool
	{
		if ($this->state)
		{
			$this->state->run();
		}

		return !is_null($this->state);
	}
}
