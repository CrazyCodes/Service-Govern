<?php
	
	namespace Rpc\Libs;
	
	class RpcMain
	{
		protected $client;
		
		public function __construct($center)
		{
			$this->client = new \swoole_client(SWOOLE_SOCK_TCP);
			
			$this->client->connect ($center['ip'], $center['port'], 0.5);
		}
		
		public function send($service, $action, $arguments)
		{
			$request = new Request();
			
			$request->setService ($service);
			$request->setAction ($action);
			$request->setParameters ($arguments);
			
			$this->client->send (json_encode ((array)$request));
			
			return $this->client->recv ();
		}
		
		public function __destruct()
		{
			$this->client->close ();
			unset($this->client);
		}
	}