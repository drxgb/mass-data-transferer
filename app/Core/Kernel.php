<?php

namespace App\Core;

use App\App;
use App\Cli\Output;
use App\Contract\Bootable;
use App\Contract\Closeable;
use App\Util\GetterTrait;
use App\Util\SetterTrait;

abstract class Kernel
	implements Bootable, Closeable
{
	use GetterTrait, SetterTrait;


	/**
	 * @var Output
	 */
	private $output;


	public function __construct(
		private App $app
	)
	{}


	/**
	 * @return array
	 */
	protected function restrictedSetters() : array
	{
		return [
			'app',
		];
	}


	/**
	 * Executa um passo da aplicação.
	 *
	 * @return boolean Se for `true`, significa que o passo pode ser repetido.
	 */
	public abstract function loop() : bool;
}