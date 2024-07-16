<?php

namespace App\Contract;


interface Runnable
{
	/**
	 * Executa uma rotina.
	 *
	 * @return void
	 */
	function run() : void;
}
