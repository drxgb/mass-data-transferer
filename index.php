<?php

use App\App;
use App\Cli\ConsoleInput;
use App\Cli\ConsoleOutput;
use App\Core\Bootstrap;


// Inicializa o autoloader
require __DIR__ . '/vendor/autoload.php';

// Inicializa o console
$output = new ConsoleOutput;
$input = new ConsoleInput(STDIN);

try
{
	// Recebe os argumentos do programa
	$bootstrap = new Bootstrap(__DIR__, $argv);

	//* Inicializa a aplicação e executa
	$app = new App($input, $output);

	$app->makeKernel($bootstrap->makeKernelClass(), $bootstrap->args);
	$app->run();
}
catch (\Throwable $e)
{
	$output->writeLine();
	$output->writeLine($e->getMessage());
	$output->writeLine("File: {$e->getFile()}");
	$output->writeLine("Line: {$e->getLine()}");
	$output->writeLine('Stack Trace:');
	$output->writeLine($e->getTraceAsString());
	$output->writeLine();
}
