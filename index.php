<?php

use App\App;
use App\Cli\ConsoleOutput;
use App\Core\Bootstrap;


// Inicializa o autoloader
require __DIR__ . '/vendor/autoload.php';

// Inicializa o console
$console = new ConsoleOutput;

try
{
	// Recebe os argumentos do programa
	$bootstrap = new Bootstrap($argv);

	//* Inicializa a aplicação e prepara os dispositivos de saída
	$app = new App;
	$kernel = $app->make($bootstrap->makeKernelClass());
	$kernel->output = $console;

	// Executa a aplicação
	$app->run($kernel);
}
catch (\Throwable $e)
{
	$console->writeLine();
	$console->writeLine($e->getMessage());
	$console->writeLine("File: {$e->getFile()}");
	$console->writeLine("Line: {$e->getLine()}");
	$console->writeLine('Stack Trace:');
	$console->writeLine($e->getTraceAsString());
	$console->writeLine();
}
