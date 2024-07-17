<?php

namespace App\State;

use App\Core\Kernel;
use App\Core\Direction;
use App\Repository\DataRepository;


class WriteTableState extends KernelState
{
	public function __construct(
		Kernel $kernel,
		private array $data
	)
	{
		parent::__construct($kernel, Direction::WRITE);
	}


	/**
	 * @return void
	 */
	public function run(): void
	{
		$kernel = $this->kernel;
		$output = $kernel->output;

		$db = $kernel->app->db->pdo;
		$table = $kernel->table;
		$primaryKey = $kernel->primary_key;
		$column = $kernel->column;
		$repository = new DataRepository($db, $table, $primaryKey, $column);

		$output->writeLine("Updating $table table...");
		foreach ($this->data as $key => $value)
		{
			$output->write("[$key] -> $column = $value...");
			$repository->write($key, $value);
			$output->writeLine(' OK!');
		}

		$output->writeLine();
		$output->writeLine('Updated successfully!');
		$kernel->finish();
	}
}
