<?php

namespace App\State;

use App\Core\Direction;
use App\Core\Kernel;
use App\Util\GetterTrait;


class ReadFileState extends FileState
{
	use GetterTrait;


	/**
	 * @var array
	 */
	private $result;


	public function __construct(Kernel $kernel)
	{
		parent::__construct($kernel, Direction::READ);
	}


	/**
	 * @return void
	 */
	public function run(): void
	{
		$kernel = $this->kernel;
		$file = $this->getFile();
		$output = $kernel->output;

		$output->writeLine("Reading data from $file");
		$result = file_get_contents($file);
		$output->writeLine('Read successfully!');
		$data = (array) json_decode($result);

		$kernel->state = new WriteTableState($kernel, $data);
	}


	/**
	 * @return array
	 */
	protected function restrictedGetters() : array
	{
		return [
			'kernel',
			'direction',
		];
	}
}
