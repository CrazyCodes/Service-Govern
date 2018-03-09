<?php
	include '../../autoload.php';
	
	$response = new \Rpc\Libs\Response();
	
	$response->setCode (200);
	$response->setMessage ('测试成功');
	$response->setData (['name' => 'aaa']);
	$response->setRequestId (md5 (uniqid ()));
	
	echo json_encode ($response, true);