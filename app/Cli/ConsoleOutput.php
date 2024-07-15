<?php

namespace App\Cli;


class ConsoleOutput implements Output
{
	use WriteStringableLineTrait;


	/**
	 * @param mixed $out
	 * @return static
	 */
	public function write(mixed $out) : static
	{
		print_r($out);
		return $this;
	}


	/**
	 * @return mixed
	 */
	public function eol() : mixed
	{
		return PHP_EOL;
	}
}
