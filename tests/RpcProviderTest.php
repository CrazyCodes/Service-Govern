<?php
	include_once '../autoload.php';
	
	$client = new \Rpc\RpcProvider(BASE_PATH);
	
	/**
	 * @ 启动消费者监听
	 */
	$client->serverConsumer ();
	
	/**
	 * @ 启动服务提供者监听
	 */
	$client->serverProvider ();
	
	
	/**
	 * @ 请求服务提供者 （生产模式）
	 */
	$clients = $client->client ('UserService');
	var_dump ($clients->getUserInfo (['name' => 111]));
	
	/**
	 * @ 请求服务提供者 （开发模式）
	 */
	$clients = $client->devClient ('UserService');
	var_dump ($clients->getUserInfo (['name' => 111]));
