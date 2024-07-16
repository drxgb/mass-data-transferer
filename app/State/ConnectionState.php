<?php

namespace App\State;

use PDO;
use DB\Connection;
use App\Core\Direction;
use DB\Factory\DriverFactory;

class ConnectionState extends KernelState
{
	/**
	 * @return void
	 */
	public function run() : void
	{
		$kernel = $this->kernel;
		$direction = $this->direction;
		$output = $kernel->output;
		$driverName = env('DB_DRIVER');
		$driverFactory = new DriverFactory;
		$schema = $kernel->schema;

		$output->writeLine('Database connection started');

		$driver = $driverFactory->makeDriver($driverName, $schema);
		$output->writeLine("Database driver found: $driverName");
		$output->writeLine("Attempting to connect to database $schema...");

		$connection = new Connection($driver);
		$options = [
			PDO::ATTR_PERSISTENT	=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION,
		];

		$connection->connect($options);
		$kernel->app->setConnection($connection);
		$output->writeLine('Database connected successfully');
		$output->writeLine();

		if ($direction === Direction::READ)
		{
			$kernel->state = new ReadTableState($kernel, $direction);
		}
		else if ($direction === Direction::WRITE)
		{
			$kernel->state = new ReadFileState($kernel);
		}
		else
		{
			$kernel->finish();
		}
	}
}
