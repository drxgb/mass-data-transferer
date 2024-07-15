<?php

namespace App;

use DB\Connection;
use App\Core\Kernel;
use App\Util\GetterTrait;


class App
{
	use GetterTrait;


	/**
	 * @var Connection
	 */
	protected $db;


	/**
	 * Recebe o nome da aplicação.
	 * @return string
	 */
	public function getName() : string
	{
		return config('app.name');
	}


	/**
	 * Recebe a versão da aplicação.
	 * @return string
	 */
	public function getVersion() : string
	{
		return config('app.version');
	}


	/**
	 * Cria o núcleo principal da aplicação.
	 * @param string $kernelClass
	 * @return Kernel
	 */
	public function make(string $kernelClass) : Kernel
	{
		return new $kernelClass($this);
	}


	/**
	 * Executa a aplicação.
	 * @param Kernel $kernel
	 * @return void
	 */
	public function run(Kernel $kernel) : void
	{
		if ($kernel->boot())
		{
			while ($kernel->loop());
		}

		$kernel->close();
	}
}
