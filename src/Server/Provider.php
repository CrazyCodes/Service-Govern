<?php
	
	namespace Rpc\Server;
	
	class Provider
	{
		public function __construct($config)
		{
			$server = new ProviderRpc($config);
			
			$server->start ();
		}
	}