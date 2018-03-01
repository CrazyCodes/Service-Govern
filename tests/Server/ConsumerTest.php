<?php
	require_once "../../autoload.php";
	
	$config = require_once BASE_PATH . '/config/app.php';
	
	new \Rpc\Server\Consumer($config);
	
	