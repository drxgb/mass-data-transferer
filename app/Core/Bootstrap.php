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

        $acceptedModes = [
            [ 
				'class'		=> HelpApplication::class,
				'params' 	=> [ '--help', '-h', '-H' ],
			],
            [
				'class'		=> VersionApplication::class,
				'params' 	=> [ '--version', '-v', '-V' ],
			],
        ];

		foreach ($acceptedModes as $acceptedMode)
		{
			if (in_array($mode, $acceptedMode['params']))
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
