<?php

namespace DB\Factory;

use DB\Driver\MySqlDriver;
use DB\Driver\SqliteDriver;
use DB\Driver\DatabaseDriver;


class DriverFactory
{
	/**
	 * Cria o driver do banco de dados.
	 *
	 * @param string $name
	 * @param string $schema
	 * @throws \Exception
	 * @return DatabaseDriver
	 */
	public function makeDriver(string $name, string $schema) : DatabaseDriver
	{
		$name = strtolower($name);
		$args = [
			'host' 		=> env('DB_HOST'),
			'port' 		=> env('DB_PORT'),
			'user' 		=> env('DB_USER'),
			'password'	=> env('DB_PASSWORD'),
			'schema'	=> $schema,
		];

		if ($name === 'mysql')
		{
			return new MySqlDriver(...$args);
		}
		else if ($name === 'sqlite')
		{
			return new SqliteDriver($schema);
		}

		throw new \Exception("$name is not a supported database driver.");
	}
}
