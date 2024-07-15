<?php

return [
	'usage'	=> "\t./run.sh [mode] [schema] [table] [column] [path]",
	'modes'	=> [
		[
			'type' 			=> '--help -h -H',
			'description'	=> 'Show this help page.',
		],
		[
			'type' 			=> '--version -v -V',
			'description'	=> 'Show the app name and version',
		],
		[
			'type' 			=> '--read -r',
			'description'	=> 'Read columns table from a database and save the retrieved data to a JSON file.',
		],
		[
			'type' 			=> '--write -r',
			'description'	=> 'Get data from a JSON file and write them to the database.',
		],
	],

	'options' => [
		'schema'	=> 'The schema name to connect to the database',
		'table'		=> 'The table name',
		'column'	=> 'The column name',
		'path'		=> "The file path name to be used. The base path is storage/. If the value is not provided, the application will use default.json as the default file",
	],
];