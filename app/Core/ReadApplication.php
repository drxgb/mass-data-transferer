<?php

namespace App\Core;


class ReadApplication extends Kernel
{
	use StartupTrait;


	/**
	 * @return bool
	 */
	public function boot() : bool
	{
		return true;
	}


	/**
	 * @return boolean
	 */
	public function loop() : bool
	{
		return false;
	}


	/**
	 * @return bool
	 */
	public function close() : bool
	{
		return true;
	}
}