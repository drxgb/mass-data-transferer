<?php

namespace App\Cli;


trait WriteStringableLineTrait
{
	/**
	 * @param mixed $out
	 * @return static
	 */
	public function writeLine(mixed $out) : static
	{
		return $this->write($out)->write($this->eol());
	}
}
