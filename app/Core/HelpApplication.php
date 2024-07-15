<?php

namespace App\Core;


class HelpApplication extends Kernel
{
	/**
	 * Inicializa aplicação.
	 * @return bool
	 */
	public function boot() : bool
	{
		return true;
	}


	public function loop() : bool
	{
		return false;
	}


	public function close() : bool
	{
		return true;
	}
}
