<?php

namespace DB\Driver;


class SqliteDriver extends DatabaseDriver
{
	public function __construct(string $schema)
	{
		$this->schema = $schema;
	}


	/**
	 * @return string
	 */
	public function dsn() : string
	{
		$path = __DIR__ . '/database';
		$schema = $this->schema;

		return "sqlite:$path/$schema.sq3";
	}
}
