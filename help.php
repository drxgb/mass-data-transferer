<?php

use App\Core\HelpApplication;
use App\Core\ReadApplication;
use App\Core\VersionApplication;


return [
	'usage'	=> "\t./run.sh [mode] [schema] [table] [primary_key] [column] [path]",
	'modes'	=> [
		[
			'class'			=> HelpApplication::class,
			'params' 		=> '--help -h -H',
			'description'	=> 'Show this help page.',
		],
		[
			'class'			=> VersionApplication::class,
			'params' 		=> '--version -v -V',
			'description'	=> 'Show the app name and version',
		],
		[
			'class'			=> ReadApplication::class,
			'params' 		=> '--read -r',
			'description'	=> 'Read columns table from a database and save the retrieved data to a JSON file.',
		],
		[
			'class'			=> 'WriteApplication::class',
			'params' 		=> '--write -w',
			'description'	=> 'Get data from a JSON file and write them to the database.',
		],
	],

	'options' => [
		'schema' =>
		[
			'description'	=> 'The schema name to connect to the database',
			'required'		=> true,
		],
		'table'	=>
		[
			'description'	=> 'The table name',
			'required'		=> true,
		],
		'primary_key' =>
		[
			'description'	=> 'The table primary key',
			'required'		=> true,
		],
		'column' =>
		[
			'description'	=> 'The column name',
			'required'		=> true,
		],
		'path' =>
		[
			'description'	=> "The file path name to be used. The base path is storage/. If the value is not provided, the application will use default.json as the default file",
			'required'		=> false,
		],
	],
];
