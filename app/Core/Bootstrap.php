<?php

namespace App\Core;

use App\Util\GetterTrait;
use Dotenv\Dotenv;

class Bootstrap
{
	use GetterTrait;


	/**
	 * @var array<string>
	 */
	private $args;


	public function __construct(string $dir, array &$args = [])
	{
		$dotenv = Dotenv::createUnsafeImmutable($dir);
		$dotenv->load();

		$this->initArgs($args);
	}


	/**
	 * Cria o nome da classe do kernel a ser instanciado.
	 *
	 * @return string
	 */
	public function makeKernelClass() : string
	{
		$mode = $this->args['mode'];

		if (is_null($mode))
        {
            throw new \Exception('Cannot instantiate a kernel. No mode provided.');
        }

		$help = require 'help.php';
        $acceptedModes = $help['modes'];

		foreach ($acceptedModes as $acceptedMode)
		{
			if (in_array($mode, explode(' ', $acceptedMode['params'])))
			{
				return $acceptedMode['class'];
			}
		}

		throw new \Exception('Please select a mode. Use --help parametar for more details.');
	}


	/**
	 * Inicializa os argumentos do programa.
	 *
	 * @param array $args
	 * @return void
	 */
	protected function initArgs(array $args) : void
	{
		$params = array_keys(getProgramArgKeys());
		$i = 1;

		array_unshift($params, 'mode');

		foreach ($params as $param)
		{
			$this->args[$param] = $args[$i++] ?? null;
		}
	}
}
