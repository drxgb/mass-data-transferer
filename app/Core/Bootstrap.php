<?php

namespace App\Core;

use App\Util\GetterTrait;


class Bootstrap
{
	use GetterTrait;


	/**
	 * @var array<string>
	 */
	private $args;


	public function __construct(array &$args = [])
	{
		$this->initArgs($args);
	}


	protected function initArgs(array $args) : void
	{
		$params = [
			'mode',
			'schema',
			'table',
			'column',
			'path',
		];
		$i = 1;

		foreach ($params as $param)
		{
			$this->args[$param] = $args[$i++] ?? null;
		}
	}
}
