<?php
	require_once "../../autoload.php";
	
	$config = include_once BASE_PATH . '/config/app.php';
	
	$client = new \Rpc\Server\ConsumerRpc($config);
	
	$client->start ();