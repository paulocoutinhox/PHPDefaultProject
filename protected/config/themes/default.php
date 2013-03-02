<?php
return array(
	'name'              => 'TITULO',
	'theme'             => 'default',
	'defaultController' => 'home',
	
	// application components
	'components' => array(
		'db' => array(
			'connectionString'   => 'mysql:host=localhost;dbname=nome_banco', //;unix_socket=/tmp/mysql.sock;
			'emulatePrepare'     => true,
			'username'           => 'root',
			'password'           => 'vertrigo',
			'charset'            => 'utf8',
			'enableProfiling'    => YII_DEBUG,
			'enableParamLogging' => YII_DEBUG
		),
	),

	'params' => array(
		'adminEmail'		 	   => 'paulo@prsolucoes.com',
		'poweredText'		 	   => 'Powered by PRSoluções',
		'currencyFormat'	 	   => '#,##0.00',
		'percentFormat'	 	       => '0.00',
		'dateFormat'		       => 'dd/MM/yyyy',
		'dateTimeFormat'		   => 'dd/MM/yyyy - HH:mm:ss',
		
		'mailHost'                 => 'smtp.gmail.com',
		'mailPort'                 => '587',
		'mailUsername'             => 'paulo@prsolucoes.com',
		'mailPassword'             => '',
		'mailAuth'                 => true,
		'mailSMTP'                 => true,
		'mailSecureMode'           => 'tls',
		'mailLanguage'             => 'br',
		'mailCharset'              => 'UTF-8',
		'mailFromEmail'            => 'paulo@prsolucoes.com',
		'mailFromName'             => 'paulo.coutinho',
	),
);