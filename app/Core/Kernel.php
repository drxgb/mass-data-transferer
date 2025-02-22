<?php

namespace App\Core;

use App\App;
use App\Cli\Input;
use App\Cli\Output;
use App\Contract\Bootable;
use App\Contract\Closeable;
use App\State\KernelState;
use App\Util\GetterTrait;
use App\Util\SetterTrait;


abstract class Kernel
	implements Bootable, Closeable
{
	use GetterTrait, SetterTrait;


	/**
	 * @var KernelState
	 */
	protected $state;

	/**
	 * @var Output
	 */
	private $output;

	/**
	 * @var Input
	 */
	private $input;

	/**
	 * @var array<mixed>
	 */
	private $options;


	public function __construct(
		private App $app,
		array $args = []
	)
	{
		$this->init($args);
		$this->options = [];
	}


	/**
	 * Recebe a opção.
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getOption(string $name) : mixed
	{
		return $this->options[$name] ?? null;
	}


	/**
	 * Define um valor à uma opção.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function setOption(string $name, mixed $value) : void
	{
		$this->options[$name] = $value;
	}


	/**
	 * Executa uma única tarefa.
	 *
	 * @return void
	 */
	public function runStep() : void
	{
		$this->loop();
	}


	/**
	 * Sinaliza o fim das tarefas.
	 *
	 * @return void
	 */
	public function finish() : void
	{
		$this->state = null;
	}


	/**
	 * Inicializa os membros.
	 *
	 * @param array $args
	 * @return void
	 */
	protected function init(array $args) : void
	{}


	/**
	 * Exige um dispositivo de entrada.
	 *
	 * @throws \Exception
	 * @return void
	 */
	protected function assertInputExists() : void
	{
		if (!$this->input)
		{
			throw new \Exception('Input device not found.');
		}
	}


	/**
	 * Exigee um dispositivo de saída.
	 *
	 * @throws \Exception
	 * @return void
	 */
	protected function assertOutputExists() : void
	{
		if (!$this->output)
		{
			throw new \Exception('Output device not found.');
		}
	}


	/**
	 * @return array
	 */
	protected function restrictedSetters() : array
	{
		return [
			'app',
			'options',
		];
	}


	/**
	 * Executa um passo da aplicação.
	 *
	 * @return boolean Se for `true`, significa que o passo pode ser repetido.
	 */
	public abstract function loop() : bool;
}
