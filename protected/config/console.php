<?php

$mainConfig = require(dirname(__FILE__) . '/main.php');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Console Application',
	'components'=>array(
		'db' => $mainConfig['components']['db'],
	),
	'commandMap'=>array(
		'migrate'=>array(
			'class'=>'system.cli.commands.MigrateCommand',
			'migrationPath'=>'application.migrations',
			'migrationTable'=>'migration',
			'connectionID'=>'db',
		),
	),
);
