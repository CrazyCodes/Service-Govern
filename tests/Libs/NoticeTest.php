<?php
	include_once "../../autoload.php";
	
	$config = include_once BASE_PATH . '/config/app.php';
	
	\Rpc\Libs\Notice::online ($config);
	\Rpc\Libs\Notice::offline ($config);
	\Rpc\Libs\Notice::log ($config, []);