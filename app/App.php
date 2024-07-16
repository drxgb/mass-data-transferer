<?php

namespace App;

use App\Cli\Input;
use App\Cli\Output;
use DB\Connection;
use App\Core\Kernel;
use App\Util\GetterTrait;
use App\Contract\Runnable;
use App\Core\VersionApplication;

class App implements Runnable
{
	use GetterTrait;


	/**
	 * @var Connection
	 */
	private $db;

	/**
	 * @var Kernel
	 */
	private $kernel;


	public function __construct(
		private Input $input,
		private Output $output
	)
	{}


	/**
	 * Recebe o nome da aplicação.
	 * @return string
	 */
	public function getName() : string
	{
		return config('app.name');
	}


	/**
	 * Recebe a versão da aplicação.
	 * @return string
	 */
	public function getVersion() : string
	{
		return config('app.version');
	}


	/**
	 * Cria o núcleo principal da aplicação.
	 * @param string $kernelClass
	 * @param array $args
	 * @return Kernel
	 */
	public function makeKernel(string $kernelClass, array $args = []) : Kernel
	{
		$this->kernel = new $kernelClass($this, $args);
		$this->kernel->input = $this->input;
		$this->kernel->output = $this->output;

		return $this->kernel;
	}


	/**
	 * Executa a aplicação.
	 * @return void
	 */
	public function run() : void
	{
		$kernel = $this->kernel;

		if ($kernel)
		{
			try
			{
				if ($kernel->boot())
				{
					while ($kernel->loop());
				}
			}
			catch (\Exception $e)
			{
				throw $e;
			}
			finally
			{
				$kernel->close();
			}
		}
	}


	/**
	 * Mostra o título do programa.

	 * @return void
	 */
	public function showTitle() : void
	{
		$version = new VersionApplication($this);
		$version->output = $this->output;
		$version->runStep();
	}


	/**
	 * Define uma nova conexão ao banco de dados.
	 *
	 * @param Connection $connection
	 * @return void
	 */
	public function setConnection(Connection $connection) : void
	{
		if ($this->db)
		{
			$this->db->close();
		}

		$this->db = $connection;
	}
}
