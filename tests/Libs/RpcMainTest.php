<?php
	include_once '../../autoload.php';
	
	$client = new \Rpc\Libs\RpcMain([
		'ip'   => '127.0.0.1',
		'port' => '9999',
	]);
	
	
	$result = $client->send ('UserService', 'getUserInfo', [
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
	
	
	]);
	
	var_dump ($result);
	