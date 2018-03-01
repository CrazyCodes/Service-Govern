<?php
	
	namespace Rpc;
	
	use Rpc\Develop\Client;
	use Rpc\Server\Consumer;
	use Rpc\Server\Provider;
	use Rpc\Server\Server;
	
	class RpcProvider
	{
		protected $config, $configPath, $consumerConfig, $centerConfig, $providerConfig;
		
		public function __construct($configPath)
		{
			$this->configPath     = $configPath;
			$this->config         = require_once $this->configPath . '/config/app.php';
			$this->consumerConfig = require_once $this->configPath . '/config/consumer.php';
			$this->providerConfig = require_once $this->configPath . '/config/provider.php';
			
			$this->config['app_name'] = $this->providerConfig['app_name'];
			
		}
		
		/**
		 * @ 消费者服务器
		 */
		public function server()
		{
			new Server($this->config);
		}
		
		/**
		 * @param $service
		 * @ 使用服务提供者 (生产环境)
		 *
		 * @return Libs\Consumer\Client
		 */
		public function client($service)
		{
			$this->centerConfig = require_once $this->configPath . '/config/' . $service . '/center.php';
			
			return new \Rpc\Libs\Consumer\Client($service, $this->consumerConfig, $this->centerConfig);
		}
		
		/**
		 * @param $service
		 * @ 使用服务提供者 (开发环境)
		 *
		 * @return Client
		 */
		public function devClient($service)
		{
			return new Client($service, $this->config);
		}
		
		
		/**
		 * @ 对外开发接口
		 * @return Open
		 */
		public function open()
		{
			return new Open($this->configPath);
		}
		
	}