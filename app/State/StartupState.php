<?php

namespace App\State;

use App\Core\Kernel;


class StartupState extends KernelState
{
	/**
	 * @return void
	 */
	public function run() : void
	{
		$kernel = $this->kernel;
		$output = $kernel->output;
		$input = $kernel->input;

		foreach (getProgramArgKeys() as $key => $required)
		{
			$keyName = str_replace('_', ' ', ucfirst($key));
			if (!$required)
			{
				$keyName .= ' (Optional)';
			}

			if (is_null($kernel->$key))
			{
				$value = false;

				while ($value === false)
				{
					$output->write("$keyName: ");
					$value = $input->readLine();

					if (!$required)
						break;
				}

				$kernel->$key = trim($value);
			}
			else
			{
				$output->writeLine("$keyName loaded: {$kernel->$key}");
			}
		}

		$output->writeLine();
		$this->kernel->state = new ConnectionState($kernel, $this->direction);
	}
}
