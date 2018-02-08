<?php
	require_once "../autoload.php";
	
	$client = new \Rpc\Libarary\NoticeRequest();
	$client->request ([
		'name'   => 'test',
		'center' => [
			[
				'ip'   => '123.22222.3.3',
				'port' => '12312',
			],
		],
	]);