<?php

namespace App\Cli;


trait WriteStringableLineTrait
{
	/**
	 * @param mixed $out
	 * @return static
	 */
	public function writeLine(mixed $out = null) : static
	{
		if (is_null($out))
			return $this->write($this->eol());

		return $this->write($out)->write($this->eol());
	}
}
