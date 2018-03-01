<?php
	require_once "../../autoload.php";
	
	$config = require_once BASE_PATH . '/config/app.php';
	
	$client = new \Rpc\Server\ProviderRpc($config);
	
	$client->start ();