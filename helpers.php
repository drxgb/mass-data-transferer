<?php


/**
 * Recebe o valor da configuração.
 * @param string $key
 * @return mixed
 */
function config(string $key) : mixed
{
	include 'config.php';

	$keys = explode('.', $key);
	$value = $config;

	for ($i = 0; $i < count($keys); ++$i)
	{
		$currentKey = $keys[$i];
		$value = @$value[$currentKey];

		if (is_null($value))
		{
			break;
		}
	}

	return $value;
}


/**
 * Recebe o valor da variável de ambiente.
 *
 * @param string $name
 * @param mixed $fallback
 * @return mixed
 */
function env(string $name, mixed $fallback = null) : mixed
{
	$value = $_ENV[$name];
	return $value ?: $fallback;
}


/**
 * Recebe as chaves de argumento do programa.
 *
 * @return array
 */
function getProgramArgKeys() : array
{
	$help = require 'help.php';
	$options = $help['options'];
	$keys = [];

	foreach ($options as $k => $option)
	{
		$keys[$k] = $option['required'];
	}

	return $keys;
}
