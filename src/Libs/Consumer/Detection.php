<?php
	
	namespace Rpc\Libs\Consumer;
	
	/**
	 * @content 消费者配置文件判断
	 * Trait Detection
	 * @package Rpc\Libs\Consumer
	 */
	trait Detection
	{
		public function existService($serviceName,$consumerConfig)
		{
			if (!in_array ($serviceName, $consumerConfig)) {
				die('服务不存在');
			}
		}
	}