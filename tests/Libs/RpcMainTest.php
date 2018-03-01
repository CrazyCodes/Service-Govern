<?php
	include_once '../../autoload.php';
	
	$client = new \Rpc\Libs\RpcMain([
		'ip'   => '127.0.0.1',
		'port' => '9991',
	]);
	
	$result = $client->send ('UserService', 'getUserInfo', [
		'user_id'  => 10000,
		'username' => '测试新的RPC',
	]);
	
	var_dump ($result);
	