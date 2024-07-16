<?php

namespace App\Core;
use App\State\StartupState;


class ReadApplication extends StateableKernel
{
	use StartupTrait;


	/**
	 * @return bool
	 */
	public function boot() : bool
	{
		$this->assertInputExists();
		$this->assertOutputExists();

		$this->app->showTitle();
		$this->output->writeLine('*** Read mode ***');
		$this->output->writeLine('=================');
		$this->output->writeLine();
		$this->state = new StartupState($this);

		return true;
	}


	/**
	 * @return bool
	 */
	public function close() : bool
	{
		return true;
	}
}
