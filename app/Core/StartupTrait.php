<?php

namespace App\Core;


trait StartupTrait
{
	/**
	 * @var string
	 */
	protected $schema;

	/**
	 * @var string|array<string>
	 */
	protected $table;

	/**
	 * @var string|int
	 */
	protected $primary_key;

	/**
	 * @var string|array<string>
	 */
	protected $column;

	/**
	 * @var string
	 */
	protected $path;


	/**
	 * @param array $args
	 * @return void
	 */
	protected function init(array $args) : void
	{
		foreach (array_keys(getProgramArgKeys()) as $key)
		{
			$this->$key = $args[$key];
		}
	}
}
