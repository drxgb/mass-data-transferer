<?php

namespace App\Cli;


interface Input
{
	/**
	 * Lê uma informação da entrada.
	 *
	 * @return string|bool
	 */
	function read() : string|bool;


	/**
	 * Lê uma linha da entrada.
	 *
	 * @return string|bool
	 */
	function readLine() : string|bool;
}
