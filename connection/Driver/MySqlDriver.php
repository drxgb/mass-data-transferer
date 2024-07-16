<?php

namespace DB\Driver;


class MySqlDriver extends DatabaseDriver
{
	public function __construct(string $host, int $port, string $user, string $password, string $schema)
	{
		$this->host = $host;
		$this->port = $port;
		$this->user = $user;
		$this->password = $password;
		$this->schema = $schema;
	}


	/**
	 * @return string
	 */
	public function dsn() : string
	{
		$host = $this->host;
		$port = $this->port;
		$schema = $this->schema;

		return "mysql:host=$host;dbport=$port;dbname=$schema";
	}
}
