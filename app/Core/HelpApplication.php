<?php

namespace App\Core;


class HelpApplication extends Kernel
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

		if ($output)
		{
			$help = require 'help.php';

			$output->writeLine('Usage:');
			$output->writeLine($help['usage']);
			$output->writeLine();

			// Modos
			$output->writeLine('Modes:');

			foreach ($help['modes'] as $mode)
			{
				$type = $mode['type'];
				$description = $mode['description'];
				$output->writeLine("\t$type\t\t$description");
			}
			$output->writeLine();

			// Outras opções
			$output->writeLine('Other options:');

			foreach ($help['options'] as $option => $description)
			{
				$output->writeLine("\t$option\t\t$description");
			}
			$output->writeLine();
		}

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
