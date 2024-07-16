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
		return $this->kernel->path ?: config('storage.default');
	}
}
