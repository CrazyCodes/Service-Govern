<?php
	include_once '../../autoload.php';
	
	$appConfig = include_once BASE_PATH . '/config/app.php';
	
	
	\Rpc\Libs\Dispatcher::configUpdate ([
		'center'   => [
			[
				'ip'   => '127.0.0.1',
				'port' => '2222',
			],
			[
				'ip'   => '127.0.0.1',
				'port' => '1111',
			],
		],
		'consumer' => [
			'ShopService',
			'GoodService',
			'NewService',
			'TotalService',
		],
		'provider' => [
			'app_name'    => 'msm-center',
			'ip'          => "0.0.0.0",
			'port'        => 9600,
			'notify_port' => 9601,
			'services'    => [
				'ShopService',
				'GoodService',
			],
		],
	
	
	], $appConfig);