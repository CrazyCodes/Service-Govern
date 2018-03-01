<?php
	require_once "../../../autoload.php";
	$service = 'UserService';
	
	$consumer = require_once BASE_PATH . '/config/consumer.php';
	$center   = require_once BASE_PATH . '/config/' . $service . '/center.php';
	
	$userService = new \Rpc\Libs\Consumer\Client($service, $consumer, $center);
	$result      = $userService->getUserInfo ([
		'user_id'  => 10000,
		'username' => '测试新的RPC',
	]);
	
	var_dump ($result);