<?php

namespace App\State;


abstract class FileState extends KernelState
{
	/**
	 * Recebe o nome do arquivo.
	 *
	 * @return string
	 */
	protected function getFile() : string
	{
		$path = $this->kernel->path;

		if (!empty($path))
		{
			return config('storage.app_dir') . $path;
		}

		return config('storage.default');
	}
}
