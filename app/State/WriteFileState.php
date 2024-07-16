<?php

namespace App\State;

use App\Core\Direction;
use App\Core\Kernel;


class WriteFileState extends FileState
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
		$data = $this->data;
		$file = $this->getFile();
		$output = $kernel->output;

		$output->writeLine("Writing data to $file");
		file_put_contents($file, json_encode($data));

		$output->writeLine('Wrote successfully!');
		$kernel->finish();
	}
}
