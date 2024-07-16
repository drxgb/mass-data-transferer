<?php

namespace DB\Driver;

use App\Util\GetterTrait;
use App\Util\SetterTrait;


abstract class DatabaseDriver
{
	use GetterTrait;


	/**
	 * @var string
	 */
	protected $host;

	/**
	 * @var int
	 */
	protected $port;

	/**
	 * @var string
	 */
	protected $user;

	/**
	 * @var string
	 */
	protected $password;

	/**
	 * @var string
	 */
	protected $schema;


	/**
	 * Recebe o padrão do DSN do driver.
	 *
	 * @return string
	 */
	public abstract function dsn() : string;
}
