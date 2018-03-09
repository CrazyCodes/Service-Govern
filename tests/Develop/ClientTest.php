<?php
	require_once "../../autoload.php";
	
	$config = include_once BASE_PATH . '/config/app.php';
	
	$userService = new \Rpc\Develop\Client('UserService', $config);
	var_dump ($userService->getUserInfo (10000));