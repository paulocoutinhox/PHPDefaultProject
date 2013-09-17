<?php
return array(
	'name'              => 'PHP DEFAULT PROJECT',
	'theme'             => 'default',
	'defaultController' => 'home',
	
	// application components
	'components' => array(
		'db' => array(
			'connectionString'   => 'mysql:host=127.0.0.1;dbname=NAME-OF-DATABASE', //;unix_socket=/tmp/mysql.sock;
			'emulatePrepare'     => true,
			'username'           => 'DATABASE-USERNAME',
			'password'           => 'DATABASE-PASSWORD',
			'charset'            => 'utf8',
			'enableProfiling'    => YII_DEBUG,
			'enableParamLogging' => YII_DEBUG
		),
	),

	'params' => array(
		'adminEmail'		 	   => 'youremail@gmail.com',
		'poweredText'		 	   => 'Powered by PRSoluções',
		'currencyFormat'	 	   => '#,##0.00',
		'percentFormat'	 	       => '0.00',
		'dateFormat'		       => 'dd/MM/yyyy',
		'dateTimeFormat'		   => 'dd/MM/yyyy - HH:mm:ss',
		
		'mailHost'                 => 'smtp.gmail.com',
		'mailPort'                 => '587',
		'mailUsername'             => 'youremail@gmail.com',
		'mailPassword'             => '',
		'mailAuth'                 => true,
		'mailSMTP'                 => true,
		'mailSecureMode'           => 'tls',
		'mailLanguage'             => 'br',
		'mailCharset'              => 'UTF-8',
		'mailFromEmail'            => 'youremail@gmail.com',
		'mailFromName'             => 'Your Name',
	),
);
