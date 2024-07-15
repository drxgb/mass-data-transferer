<?php

use App\App;
use App\Cli\ConsoleOutput;
use App\Core\Bootstrap;
use App\Core\HelpApplication;

try
{
	// Inicializa o autoloader
	require __DIR__ . '/vendor/autoload.php';

	// Recebe os argumentos do programa
	$bootstrap = new Bootstrap($argv);

	// Inicializa o console
	$output = new ConsoleOutput;

	//* Inicializa a aplicação e prepara os dispositivos de entrada e saída
	$app = new App;
	$kernel = $app->make(HelpApplication::class);
	$kernel->output = $output;

	// Exectua a aplicação
	$app->run($kernel);
}
catch (\Throwable $e)
{
	echo PHP_EOL;
	echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
	echo 'Em: ' . $e->getFile() . PHP_EOL;
	echo 'Linha: ' . $e->getLine() . PHP_EOL;
	echo $e->getTraceAsString() . PHP_EOL . PHP_EOL;
}
