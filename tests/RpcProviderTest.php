<?php
	
	use PHPUnit\Framework\TestCase;
	
	class RpcProviderTest extends TestCase
	{
		/**
		 * @expectedException PHPUnit\Framework\Error\Error
		 */
		public function testServer()
		{
			$client = new \Rpc\RpcProvider(BASE_PATH);
			
			$client->server ();
		}
		
		public function testClient(){
			$this->markTestSkipped('跳过');
			$this->markTestIncomplete ('测试未完成');
		}
	}
	
	//	include_once '../autoload.php';
	//
	//	$client = new \Rpc\RpcProvider(BASE_PATH);
	//
	//	/**
	//	 * @ 启动监听
	//	 */
	//	$client->server ();
	//
	//	/**
	//	 * @ 请求服务提供者 （生产模式）
	//	 */
	//	$clients = $client->client ('UserService');
	//	var_dump ($clients->getUserInfo (['name' => 111]));
	//
	//	/**
	//	 * @ 请求服务提供者 （开发模式）
	//	 */
	//	$clients = $client->devClient ('UserService');
	//	var_dump ($clients->getUserInfo (['name' => 111]));
	//
	//	/**
	//	 * @ 对外开放接口
	//	 */
	//	$open = $client->open ();
	//	var_dump ($open);
