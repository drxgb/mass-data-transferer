<?php

$config['app'] = [
	'name'		=> 'Mass Data Transferer',
	'version'	=> '1.0.0',
];
$config['storage'] = [
	'app_dir'	=> __DIR__ . '/storage/',
];


$config['storage']['default'] = $config['storage']['app_dir'] . 'default.json';