<?php
	include_once '../../../autoload.php';
	
	$service = 'UserService';
	$center  = require_once BASE_PATH . '/config/' . $service . '/center.php';
	
	$client = new \Rpc\Libs\Consumer\ClientRpc($service, $center);
	
	$client->send ($service, 'getUserInfo', [
		'username' => 'zhangsan',
	]);