<?php
	include "../../autoload.php";
	
	$monitor = new \Rpc\RpcProvider(BASE_PATH);
	$monitor->monitorStart ();