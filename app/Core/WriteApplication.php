<?php

namespace App\Core;

use App\State\StartupState;


class WriteApplication extends StateableKernel
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
		$this->output->writeLine('*** Write mode ***');
		$this->output->writeLine('=================');
		$this->output->writeLine();
		$this->state = new StartupState($this, Direction::WRITE);

		return true;
	}


	/**
	 * @return bool
	 */
	public function close() : bool
	{
		$this->app->db->close();
		return true;
	}
}
