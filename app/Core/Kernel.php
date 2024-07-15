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


	public abstract function loop() : bool;
}
