<?php

namespace DB;

use App\Util\GetterTrait;
use DB\Driver\DatabaseDriver;
use PDO;

class Connection
{
	use GetterTrait;


	/**
	 * @var PDO
	 */
	private $pdo;


	public function __construct(
		private DatabaseDriver $driver
	)
	{}


	/**
	 * Tenta estabelecer uma conexão com o banco de dados.
	 *
	 * @param array $options
	 * @return PDO
	 */
	public function connect(array $options = []) : PDO
	{
		return $this->pdo = new PDO(
			$this->driver->dsn(),
			$this->driver->user,
			$this->driver->password,
			$options
		);
	}


	public function close() : void
	{
		$this->pdo = null;
	}


	/**
	 * @return array
	 */
	protected function restrictedGetters() : array
	{
		return [
			'driver',
		];
	}
}
