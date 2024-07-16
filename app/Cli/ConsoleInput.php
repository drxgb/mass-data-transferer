<?php

namespace App\Cli;


class ConsoleInput implements Input
{
	public function __construct(
		private mixed $stream
	)
	{}


	/**
	 * @return string|bool
	 */
	public function read() : string|bool
	{
		return fgetc($this->stream);
	}


	/**
	 * @return string|bool
	 */
	public function readLine() : string|bool
	{
		return fgets($this->stream);
	}
}
