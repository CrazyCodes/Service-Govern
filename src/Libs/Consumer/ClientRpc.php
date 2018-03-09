<?php
	
	namespace Rpc\Libs\Consumer;
	
	use Rpc\Libs\Dispatcher;
	use Rpc\Libs\Request;
	
	/**
	 * @content 消费者请求方法
	 * Class ClientRpc
	 * @package Rpc\Libs\Consumer
	 */
	class ClientRpc
	{
		protected $client;
		
		public function __construct($service_name, $centerConfig)
		{
			$this->client = new \swoole_client(SWOOLE_SOCK_TCP);
			
			$center = Dispatcher::loadBalance ($service_name, $centerConfig);
			$this->client->connect ($center['ip'], $center['port'], 0.5);
		}
		
		public function send($service, $action, $arguments)
		{
			$request = new Request();
			
			$request->setService ($service);
			$request->setAction ($action);
			$request->setParameters ($arguments[0]);
			$this->client->send (json_encode ((array)$request));
			
			return $this->client->recv ();
		}
		
		public function __destruct()
		{
			$this->client->close ();
			unset($this->client);
		}
	}