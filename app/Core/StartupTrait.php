<?php

namespace App\Core;


trait StartupTrait
{
	/**
	 * @var string
	 */
	private $schema;

	/**
	 * @var string|array<string>
	 */
	private $table;

	/**
	 * @var string|array<string>
	 */
	private $column;

	/**
	 * @var string
	 */
	private $path;


	/**
	 * @param array $args
	 * @return void
	 */
	protected function init(array $args) : void
	{
		foreach ($this->getArgKeys() as $key)
		{
			$this->$key = $args[$key];
		}
	}


	/**
	 * Verificação dos argumentos de entrada.
	 *
	 * @return void
	 */
	protected function startSettings() : void
	{
		$output = $this->output;

		foreach ($this->getArgKeys() as $key)
		{
			$key = ucfirst($key);

			if (is_null($this->$key))
			{
				$output->write("$key: ");
			}
		}
	}


	/**
	 * Recebe as chaves de argumento do programa.
	 *
	 * @return array
	 */
	private function getArgKeys() : array
	{
		return [
			'schema',
			'table',
			'column',
			'path',
		];
	}
}