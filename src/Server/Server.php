<?php
	
	namespace Rpc\Server;
	
	/**
	 * Class Consumer
	 * @content 消费者Server
	 * @package Rpc\Server
	 */
	class Server
	{
		public function __construct($config)
		{
			$server = new ServerRpc($config);
			
			$server->start ();
		}
	}