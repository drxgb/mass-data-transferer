<?php

namespace App\Core;


class VersionApplication extends Kernel
{
	/**
	 * @return bool
	 */
	public function boot() : bool
	{
		$this->assertOutputExists();
		return true;
	}


	/**
	 * @return boolean
	 */
	public function loop() : bool
	{
		$output = $this->output;

		if (!$output)
			return false;

		$name = config('app.name');
		$version = config('app.version');

		$output->writeLine("*** $name ***");
		$output->writeLine('Created by Dr.XGB');
		$output->writeLine("Version: $version");
		$output->writeLine();

		return false;
	}


	/**
	 * @return boolean
	 */
	public function close() : bool
	{
		return true;
	}
}
