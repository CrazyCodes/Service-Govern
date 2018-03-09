<?php
	include_once '../../autoload.php';
	
	$request = new \Rpc\Libs\Request();
	$request->setService ('UserService');
	$request->setAction ('getUserInfo');
	$request->setParameters ([
		'username' => 'zhangsan',
	]);
	
	var_dump (json_encode ($request));