<?php
	include "../../autoload.php";
	
	$config = include_once BASE_PATH . '/config/app.php';
	
	\Rpc\Libs\Logs::receive (json_encode ([
		'requestId'  => md5 (1234),
		'service'    => 'UserService',
		'action'     => 'getUserInfo',
		'parameters' => [
			'username' => 'jikai',
		],
	]));
	
	\Rpc\Libs\Logs::add ('username', '123');
	
	var_dump (\Rpc\Libs\Logs::$log);