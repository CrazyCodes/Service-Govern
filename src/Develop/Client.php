<?php
	
	namespace Rpc\Develop;
	
	/**
	 * @content 消费者调用方法 (开发者调用方法)
	 * Class Client
	 * @package Rpc\Libs\Consumer
	 */
	class Client
	{
		protected $serviceName, $config;
		
		public function __construct($serviceName, $config)
		{
			$this->serviceName = $serviceName;
			$this->config      = $config;
		}
		
		public function __call($name, $arguments)
		{
			$className = $this->config['develop_path'] . $this->serviceName;
			
			$app = new $className;
			
			$response = $app->{$name}($arguments[0]);
			
			return (json_decode ($response, true));
		}
	}