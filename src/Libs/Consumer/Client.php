<?php
	
	namespace Rpc\Libs\Consumer;
	
	/**
	 * @content 消费者调用方法
	 * Class Client
	 * @package Rpc\Libs\Consumer
	 */
	class Client
	{
		use Detection;
		
		protected $serviceName, $centerConfig;
		
		public function __construct($serviceName, $consumerConfig, $centerConfig)
		{
			$this->serviceName = $serviceName;
			
			$this->centerConfig = $centerConfig;
			
			$this->existService ($this->serviceName, $consumerConfig);
		}
		
		public function __call($name, $arguments)
		{
			$client = new ClientRpc($this->serviceName, $this->centerConfig);
			
			$response = $client->send ($this->serviceName, $name, $arguments);
			
			return (json_decode ($response, true));
			
		}
	}