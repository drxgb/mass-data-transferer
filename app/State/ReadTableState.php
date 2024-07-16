<?php

namespace App\State;
use App\Repository\DataRepository;



class ReadTableState extends KernelState
{
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

		$output->writeLine("Reading $table table...");
		$result = $repository->read();

		foreach ($result as $row)
		{
			$key = $row[$primaryKey];
			$value = $row[$column];
			$data[$key] = $value;
		}

		$kernel->state = new WriteFileState($kernel, $data ?? []);
	}
}
