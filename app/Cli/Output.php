<?php

namespace App\Cli;


interface Output
{
	/**
	 * Escreve uma informação para o dispositivo de saída.
	 * @param mixed $out
	 * @return static
	 */
	function write(mixed $out) : static;


	/**
	 * Escreve uma linha para o dispoaitivo de saída.
	 * @param mixed $out
	 * @return static
	 */
	function writeLine(mixed $out) : static;


	/**
	 * Recebe o caractere para quebra de linha.
	 * @return mixed
	 */
	function eol() : mixed;
}
