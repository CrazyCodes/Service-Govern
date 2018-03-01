<?php
	
	namespace Rpc\Server;
	
	/**
	 * Class Consumer
	 * @content 消费者Server
	 * @package Rpc\Server
	 */
	class Consumer
	{
		public function __construct($config)
		{
			$server = new ConsumerRpc($config);
			
			$server->start ();
		}
	}