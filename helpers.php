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
